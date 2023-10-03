<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Department;
use App\Models\UserStatus;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        // $users = User::join('departments', 'users.department_id', '=', 'departments.id')
        //     ->join('users_status', 'users.status_id', '=', 'users_status.id')
        //     ->select(
        //         'users.*',
        //         'departments.name as departments',
        //         'users_status.name as status'
        //     )
        //     ->paginate(5);

        // with,load, withCount, withMax, withMin, withAvg, withSum
        $users = User::with(['userStatus', 'departments'])->paginate(4);

        return view('contents.account', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user_status = DB::table('users_status')->get();
        // $departments = DB::table('departments')->get();

        $user_status = UserStatus::all();
        $departments = Department::all();

        return view('contents.add', compact('departments', 'user_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            're_password' => 'required',
            'department_id' => 'required',
            'status_id' => 'required',
        ], [
            'username.required' => 'Username is required',
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            're_password.required' => 'Re-Password is required',
            'department_id.required' => 'Department is required',
            'status_id.required' => 'Status is required',
        ]);

        $account = new User();
        $account->username = $request->username;
        $account->name = $request->name;
        $account->email = $request->email;
        $account->password = bcrypt($request->password);
        $account->department_id = $request->department_id;
        $account->status_id = $request->status_id;

        $userName = User::where('username', $request->username)->first();
        if ($userName) {
            return redirect(route('account.add'))
                ->with('error', 'Username already exists')
                ->withInput();
        }

        $emailUser = User::where('email', $request->email)->first();
        if ($emailUser) {
            return redirect(route('account.add'))
                ->with('error', 'Email already exists')
                ->withInput();
        }

        if ($request->password !== $request->re_password) {
            return redirect(route('account.add'))
                ->with('error', 'Password not match')
                ->withInput();
        }

        $account->save();
        return redirect(route('account'))->with('success', 'Account created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = User::find($id);
        $department = Department::all();
        $status = UserStatus::all();

        return view('contents.edit', compact('account', 'department', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $account = User::find($id);

        if ($request->has('name')) {
            $account->name = $request->input('name');
        }
        if ($request->has('email')) {
            $account->email = $request->input('email');
        }

        if ($request->has('department_id')) {
            $account->department_id = $request->input('department_id');
        }

        if ($request->has('status_id')) {
            if ($id == 1) {
                return redirect(route('account'))->with('error', 'Account cannot be updated');
            }
            $account->status_id = $request->input('status_id');
        }

        $account->save();
        return redirect(route('account'))->with('success', 'Account updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        // $account = User::find($id);
        // $account->delete();
        // return redirect(route('account'))->with('success', 'Account deleted successfully');

        if ($id != 1) {
            User::find($id)->delete();
            return redirect()->route('account')->with('success', 'Account deleted successfully');
        } else {
            return redirect()->route('account')->with('error', 'Account cannot be deleted');
        }
    }
}

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

    public $data = [];

    public function index()
    {
        $this->data['title'] = 'Account';

        $users = User::join('departments', 'users.department_id', '=', 'departments.id')
            ->join('users_status', 'users.status_id', '=', 'users_status.id')
            ->select(
                'users.*',
                'departments.name as departments',
                'users_status.name as status'
            )
            ->get();

        // return response()->json($users);
        return view('contents.account', compact('users'), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_status = DB::table('users_status')->get();
        $departments = DB::table('departments')->get();

        // return response()->json([
        //     'user_status' => $user_status,
        //     'departments' => $departments
        // ]);
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
        $validatedData = $request->validate([
            "status_id" => "required",
            "username" => "required|unique:users,username",
            "name" => "required|max:255",
            "email" => "required|email",
            "department_id" => "required",
            "password" => "required|confirmed"
        ], [
            "status_id.required" => "Nhập Tình trạng",
            "username.required" => "Nhập Tên Tài khoản",
            "username.unique" => "Tên Tài khoản đã tồn tại",

            "name.required" => "Nhập Họ và Tên",
            "name.max" => "Ký tự tối đa là 255",

            "email.required" => "Nhập Email",
            "email.email" => "Email không hợp lệ",

            "department_id.required" => "Nhập Phòng ban",
            "password.required" => "Nhập Mật khẩu",
            "password.confirmed" => "Mật khẩu và Xác nhận mật khẩu không khớp"
        ]);
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

        // return response()->json($account);
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

        $account = User::find($id);

        $account->delete();
        return redirect(route('account'))->with('success', 'Account deleted successfully');
    }
}

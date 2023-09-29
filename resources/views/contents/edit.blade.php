@extends('layouts.client')

@section('content')
    <h1 class="text-center p-2 font-bold text-xl uppercase">Edit user account id: {{ $account->id }}</h1>
    <main class="">
        <div class='mx-auto w-8/12 bg-white rounded-lg shadow-md'>
            <form action="{{ route('account.update', ['id' => $account->id]) }}" method="POST">
                @csrf
                <div class='w-full px-5 py-5'>
                    <div class="mt-3">
                        <label for="" class="block font-semibold">Name</label>
                        <input type="name" placeholder="Nhập name" class="w-full px-3 py-2 outline-none border rounded-lg"
                            id="name" name="name" value="{{ $account->name }}" />
                    </div>

                    <div class="mt-3">
                        <label for="" class="block font-semibold">Email</label>
                        <input type="email" placeholder="Tài khoản email ứng viên"
                            class="w-full px-3 py-2 outline-none border rounded-lg" id="email" name="email"
                            value="{{ $account->email }}" />
                    </div>

                    <div class="mt-3">
                        <label for="department" class="block font-semibold">Department</label>
                        <select id="department_id" name="department_id"
                            class="w-full px-3 py-2 outline-none border rounded-lg">
                            @foreach ($department as $dept)
                                <option value="{{ $dept->id }}" @if ($account->department_id == $dept->id) selected @endif>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-3">
                        <label for="status" class="block font-semibold">Status</label>
                        <select name="status_id" id="status_id" class="w-full px-3 py-2 outline-none border rounded-lg">
                            @foreach ($status as $status)
                                <option value="{{ $status->id }}" @if ($account->status_id == $status->id) selected @endif>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-5 flex justify-end gap-x-3">
                        <button type="submit"
                            class="rounded-md bg-green-500 hover:bg-green-700 text-white px-4 py-2">Save</button>

                        <button type="submit" class="rounded-md bg-green-500 hover:bg-green-700 text-white px-4 py-2">
                            <a href="{{ route('account') }}">Cancel</a>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

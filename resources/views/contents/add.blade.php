<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @extends('layouts.client')

    @section('content')
        <main class="">
            <h2 class="text-center p-2 font-bold text-xl uppercase">Add New Account</h2>
            <div class='mx-auto w-8/12 bg-white rounded-lg shadow-md'>
                <form action="{{ route('account.store') }}" method="POST">
                    @csrf
                    <div class='w-full px-5 py-5'>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Username</label>
                            <input type="name" placeholder="Nhập username"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="username" name="username" />
                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Name</label>
                            <input type="name" placeholder="Nhập name"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="name" name="name" />
                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Email</label>
                            <input type="email" placeholder="Nhập email"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="email" name="email" />
                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Password</label>
                            <input type="password" placeholder="*******"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="password" name="password" />
                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Re-Password</label>
                            <input type="password" placeholder="*******"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="re_password" name="re_password" />
                        </div>

                        <div class="mt-3">
                            <label for="department" class="block font-semibold">Department</label>
                            <select id="department_id" name="department_id" class="w-full px-3 py-2 outline-none border rounded-lg">
                                <option value=""></option>
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="status" class="block font-semibold">Status</label>
                            <select name="status_id" id="status_id" class="w-full px-3 py-2 outline-none border rounded-lg">
                                <option value=""></option>
                                @foreach ($user_status as $status)
                                    <option value="{{ $status->id }}">
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



</body>


</html>

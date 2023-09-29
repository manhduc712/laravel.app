@extends('layouts.client')

@section('content')
    <main class="w-8/12 mx-auto ">

        <section id="new_account">
            <h2 class="text-center p-2 font-bold text-xl uppercase">Add New Account</h2>

            <div class='mx-auto w-8/12 bg-white rounded-lg shadow-md'>
                <form action="{{ route('account.store') }}" method="POST">
                    @csrf
                    <div class='w-full px-5 py-5'>
                        <div class="mt-3">
                            <label for="" class="block font-semibold">Username</label>
                            <input type="name" placeholder="Nhập username"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="username" name="username"
                                value="{{ old('username') }}" />
                            @if ($errors->has('username'))
                                <p class="text-red-500">
                                    {{ $errors->first('username') }}
                                </p>
                            @endif

                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Name</label>
                            <input type="name" placeholder="Nhập name"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="name" name="name"
                                value="{{ old('name') }}" />
                            @if ($errors->has('name'))
                                <p class="text-red-500">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Email</label>
                            <input type="email" placeholder="Nhập email"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="email" name="email"
                                value="{{ old('email') }}" />
                            @if ($errors->has('email'))
                                <p class="text-red-500">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Password</label>
                            <input type="password" placeholder="*******"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="password" name="password" />
                            @if ($errors->has('password'))
                                <p class="text-red-500">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-3">
                            <label for="" class="block font-semibold">Re-Password</label>
                            <input type="password" placeholder="*******"
                                class="w-full px-3 py-2 outline-none border rounded-lg" id="re_password"
                                name="re_password" />
                            @if ($errors->has('re_password'))
                                <p class="text-red-500">
                                    {{ $errors->first('re_password') }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-3">
                            <label for="department" class="block font-semibold">Department</label>
                            <select id="department_id" name="department_id"
                                class="w-full px-3 py-2 outline-none border rounded-lg">
                                <option value=""></option>
                                @foreach ($departments as $dept)
                                    <option value="{{ $dept->id }}"
                                        {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                                        {{ $dept->name }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('department_id'))
                                <p class="text-red-500">
                                    {{ $errors->first('department_id') }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-3">
                            <label for="status" class="block font-semibold">Status</label>
                            <select name="status_id" id="status_id" class="w-full px-3 py-2 outline-none border rounded-lg">
                                @foreach ($user_status as $status)
                                    <option value="{{ $status->id }}"
                                        {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-5 flex justify-end gap-x-3">
                            <button type="submit"
                                class="rounded-md bg-green-500 hover:bg-green-700 text-white px-4 py-2">Save</button>

                            <button type="submit" class="rounded-md bg-blue-500 hover:bg-blue-700 text-white px-4 py-2">
                                <a href="{{ route('account') }}">Cancel</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection

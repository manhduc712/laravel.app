<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    @extends('layouts.client')

    @section('content')
        <h1 class="text-center p-2 font-bold text-xl">Danh Sách account</h1>

        <main class="flex justify-center">
            <div class="w-full px-4 py-2">
                <button
                    class="border px-4 py-2 rounded-lg text-black font-semibold hover:text-white bg-white hover:bg-[#0091ce]">
                    <a href="{{ route('account.add') }}">Add</a>
                </button>
                <table class="w-full border-collapse border border-gray-300 text-center mt-5">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Username</th>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Departments</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2">Update At</th>
                            <th class="border border-gray-300 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="bg-white">
                                <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $user->id }}</td>
                                <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $user->username }}</td>
                                <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $user->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $user->email }}</td>
                                <td class="border border-gray-300 px-4 py-2 font-semibold">{{ $user->departments }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @if ($user->status === 'Active')
                                        <span
                                            class="font-semibold bg-green-500 text-white px-2.5 py-2 rounded-lg">{{ $user->status }}</span>
                                    @else
                                        <span
                                            class="font-semibold bg-red-500 text-white px-1 py-2 rounded-lg">{{ $user->status }}</span>
                                    @endif
                                </td>
                                <td class="border border-gray-300 px-4 py-2 font-semibold">
                                    @if ($user->updated_at)
                                        {{ $user->updated_at->format('d-m-Y H:i:s') }}
                                    @else
                                        {{ 'Chưa cập nhật' }}
                                    @endif
                                </td>

                                <td class="border border-gray-300 px-4 py-2 flex justify-center gap-x-3">

                                    <button
                                        class="border px-4 py-2 rounded-lg text-black font-semibold hover:text-white bg-white hover:bg-[#0091ce]">
                                        <a href="{{ route('account.edit', ['id' => $user->id]) }}">Edit</a>
                                    </button>

                                    <form action="{{ route('account.delete', ['id' => $user->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button
                                            class="border px-4 py-2 rounded-lg text-black font-semibold hover:text-white bg-white hover:bg-[#0091ce]"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng {{ $user->id }}')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    @endsection

</body>

</html>
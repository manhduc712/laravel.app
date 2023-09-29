@extends('layouts.client')

@section('content')
    <h1 class="text-center p-2 font-bold text-xl">Check tuổi</h1>
    <main class="flex justify-center">
        <form action="{{ route('age.check') }}" method="POST" class="bg-gray-300 px-4 py-2 rounded-[40px] shadow-lg">
            @csrf
            <input type="number" id="age" name="age" placeholder="Enter age ... "
                class="px-4 py-2 rounded-[40px] w-96 focus:outline-none">
            <button type="submit"
                class="btn border bg-[#0091ce] text-white hover:bg-blue-500 px-4 py-2 rounded-[40px]">Submit</button>
        </form>
    </main>
@endsection

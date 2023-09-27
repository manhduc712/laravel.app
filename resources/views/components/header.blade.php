<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <nav class="bg-white border-gray-200 lg:fixed top-0 left-0 right-0 min-w-[270px] shadow-md">
        <div class="lg:container relative mx-auto p-4">
            <div class="grid grid-cols-1 lg:grid-cols-3">
                <div class="grid grid-cols-2 lg:grid-cols-1">
                    <a href="#" class="my-auto cursor-pointer">
                        <p class="uppercase font-bold text-xl">Laravel</p>
                    </a>
                    <button data-collapse-toggle="mega-menu-full" type="button"
                        class="inline-flex ml-auto items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="mega-menu-full" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 17 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15" />
                        </svg>
                    </button>
                </div>

                <div id="mega-menu-full"
                    class="hidden w-full md:w-full md:order-1 lg:col-span-2 lg:justify-between lg:flex ">
                    <ul
                        class="flex flex-col lg:flex-row font-medium p-4 md:p-0 mt-4 rounded-lg lg:space-x-8 md:mt-0 md:border-0">
                        <li class="md:col-span-2">
                            <a href="{{ route('home') }}" class="cursor-pointer font-medium inline-flex items-center py-5 none-underline hover:underline">Home</a>
                        </li>
                        <li class="md:col-span-2">
                            <a href="{{ route('product') }}" class="cursor-pointer font-medium inline-flex items-center py-5 none-underline hover:underline">Product</a>
                        </li>
                        <li class="md:col-span-2">
                            <a href="{{ route('account') }}" class="cursor-pointer font-medium inline-flex items-center py-5 none-underline hover:underline">Account</a>
                        </li>
                    </ul>
                    <div class="place-items-end place-self-center  w-full lg:flex md:w-auto md:order-1 lg:grid-cols-1 ">
                        <ul
                            class="flex font-medium p-4 md:p-0 mt-4 rounded-lg flex-row space-x-8 md:mt-0 md:border-0 justify-center  ">
                            <li>
                                <a href="{{ route('login') }}" class="block mt-2 none-underline hover:underline">Log In</a>
                            </li>
                            
                            <li>
                                <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded ">Sign up</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-hijau-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo Section -->
                <div class="flex items-center">
                    <span class="text-xl font-bold text-white">SpotCafe</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-[35px]">
                    <a href="" class="font-bold text-gray-400 hover:text-white">Home</a>
                    <a href="" class="font-bold text-gray-400 hover:text-white">By Activity</a>
                </div>

                <!-- User Greeting -->
                <div class="flex items-center space-x-4">
                    <span class="hidden md:block text-gray-300">Hai, <span class="font-medium text-white"></span></span>

                    <!-- Logout Link (visible on desktop) -->
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-300 hover:text-white">
                        Log Out
                    </a>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="md:hidden flex items-center">
                    <button id="menu-toggle" class="text-gray-800 focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobile-menu" class="hidden md:hidden">
            <a href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Home</a>
            <a href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">By Activity</a>
            <div class="px-4 py-2 text-gray-600">Hai, <span class="font-medium text-gray-800"></span></div>

            <!-- Logout Link in Mobile Menu -->
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Log Out</a>
        </div>
    </nav>
</body>
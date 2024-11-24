<x-app-layout>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard PIT') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-screen mx-auto">
            <div class="flex min-h-screen bg-gray-100">
                <!-- Sidebar -->
                <div class="w-64 bg-blue-600 text-white p-2 md:p-10">
                    <nav class="space-y-2">
                        <a href="{{ route('penugasan') }}" class="block px-4 py-2 hover:bg-blue-700">Penugasan</a>
                        <a href="" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                    </nav>
                </div>

                <!-- Content -->
                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <!-- Header Section -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <h2 class="text-xl font-semibold">{{ $tugas->Judul }}</h2>
                        </div>

                        <!-- List Section -->
                        <div class="p-6 space-y-4">
                            <div class="p-4 bg-blue-50 rounded-lg shadow-sm">
                                <p class="text-gray-600 mt-2">{{ $tugas->Deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</x-app-layout>
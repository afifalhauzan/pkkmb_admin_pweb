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
                        <!-- <a href="{{ route('penugasan') }}" class="block px-4 py-2 hover:bg-blue-700">Penugasan</a> -->
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-blue-700">Dashboard</a>
                        <a href="{{ route('mahasiswa') }}" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                        <a href="{{ route('absensi') }}" class="block px-4 py-2 hover:bg-blue-700">Absensi</a>
                        <a href="" class="block px-4 py-2 hover:bg-blue-700">Kegiatan</a>
                    </nav>
                </div>

                <!-- Content -->
                <div class="flex-1 p-6">
                    {{-- Display Success Message --}}
                    @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Success!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.196l-2.651 2.652a1.2 1.2 0 1 1-1.697-1.697L8.304 10l-2.652-2.651a1.2 1.2 0 0 1 1.697-1.697L10 8.304l2.651-2.652a1.2 1.2 0 0 1 1.697 1.697L11.696 10l2.652 2.651a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                    @endif

                    {{-- Display Error Message --}}
                    @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Close</title>
                                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.196l-2.651 2.652a1.2 1.2 0 1 1-1.697-1.697L8.304 10l-2.652-2.651a1.2 1.2 0 0 1 1.697-1.697L10 8.304l2.651-2.652a1.2 1.2 0 0 1 1.697 1.697L11.696 10l2.652 2.651a1.2 1.2 0 0 1 0 1.698z" />
                            </svg>
                        </span>
                    </div>
                    @endif
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Title and Add Button -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <h2 class="text-xl font-semibold">Daftar Kegiatan</h2>
                            <a href="{{ route('toAddKegiatan') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Tambah Kegiatan</a>
                        </div>
                        <div class="p-4 space-y-4">
                            @foreach($kegiatan as $kegiatan)
                            <a href="#" class="block bg-blue-50 text-gray-800 text-lg font-medium py-4 px-6 rounded-lg hover:bg-gray-300">
                                {{ $kegiatan->Nama }}
                                {{ $kegiatan->Tahun }} <!-- Replace with actual attribute -->
                            </a>
                            
                            @endforeach
                        </div>
                    </div>

                    <!-- List of Penugasan -->

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard PIT') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-screen mx-auto">
            <div class="flex min-h-screen bg-gray-100">
                <div class="w-64 bg-blue-600 text-white p-2 md:p-10">
                    <nav class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-blue-700">Dashboard</a>
                        <a href="{{ route('mahasiswa') }}" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                        <a href="{{ route('absensi') }}" class="block px-4 py-2 hover:bg-blue-700">Absensi</a>
                        <a href="{{ route('kegiatan') }}" class="block px-4 py-2 hover:bg-blue-700">Kegiatan</a>
                    </nav>
                </div>

                <div class="flex-1 p-6">
                    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Overview</h1>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-700">Total Kegiatan</h2>
                                <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-4xl font-bold text-gray-900 mt-4">{{ $totalKegiatan }}</p>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-700">Total Absensi</h2>
                                <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                            </div>
                            <p class="text-4xl font-bold text-gray-900 mt-4">{{ $totalAbsensi }}</p>
                        </div>

                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold text-gray-700">Total Mahasiswa</h2>
                                <svg class="h-8 w-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.653-.146-1.288-.423-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.653.146-1.288.423-1.857m0 0a3 3 0 014.243 0M9.857 11.143a3 3 0 014.243 0m-9.857 0a3 3 0 004.243 0M5 12.5V8a3 3 0 013-3h8a3 3 0 013 3v4.5m-3-6a3 3 0 00-6 0"></path>
                                </svg>
                            </div>
                            <p class="text-4xl font-bold text-gray-900 mt-4">{{ $totalMahasiswa }}</p>
                        </div>
                    </div>

                    <div class="mt-8 p-6 bg-white rounded-lg shadow-md">
                        <h2 class="text-xl font-semibold text-gray-700 mb-4">Export Data</h2>
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('export.kegiatan') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                                Export Kegiatan
                            </a>
                            <a href="{{ route('export.absensi') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                                Export Absensi
                            </a>
                            <a href="{{ route('export.tugas') }}" class="bg-purple-500 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out">
                                Export Tugas
                            </a>
                        </div>
                    </div>

                    {{-- @if (!empty($valid_tugas))
    <h2 class="text-2xl font-bold text-gray-800 mt-8 mb-4">Valid Tugas Overview</h2>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <ul>
            @foreach($valid_tugas as $tugas)
                <li>{{ $tugas->Judul }} - {{ $tugas->Description }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif --}}
            </div>


        </div>
    </div>
    </div>
    </div>
</x-app-layout>
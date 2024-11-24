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
                        <a href="{{ route('mahasiswa') }}" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                        <a href="" class="block px-4 py-2 hover:bg-blue-700">Absensi</a>
                        <a href="{{ route('kegiatan') }}" class="block px-4 py-2 hover:bg-blue-700">Kegiatan</a>
                    </nav>
                </div>

                <!-- Content -->
                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Title and Add Button -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <h2 class="text-xl font-semibold">Daftar Absensi</h2>
                            <a href="{{ route('toAddAbsensi') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Tambah Absensi</a>
                        </div>
                        <div class="p-4 space-y-4">
                            @foreach($valid_presensi as $valid_presensi)
                            <a href="#" class="block bg-blue-50 text-gray-800 py-4 px-6 rounded-lg hover:bg-gray-300">
                                <div class="font-medium text-lg mb-2"> <!-- Title at the top -->
                                    {{ $valid_presensi->Kode_Presensi }}
                                </div>
                                <div class="text-gray-600"> <!-- Description at the bottom -->
                                    {{ $valid_presensi->Description }}
                                </div>
                            </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
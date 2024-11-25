<x-app-layout>
    <x-slot name="">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-blue-50">
        <div class="max-w-screen mx-auto">
            <div class="flex min-h-screen bg-gray-100">
                <!-- Sidebar -->
                <div class="w-64 bg-blue-600 text-white p-2 md:p-10">
                    <nav class="space-y-2">
                        <a href="#" class="block px-4 py-2 hover:bg-blue-700">Penugasan</a>
                        <a href="{{ route('QCmahasiswa') }}" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                    </nav>
                </div>

                <!-- Content -->
                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Title and Add Button -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <h2 class="text-xl font-semibold">Daftar Penugasan</h2>
                            <a href="{{ route('QCtoAddPenugasan') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Tambah Tugas</a>
                        </div>

                        <!-- List of Penugasan -->
                        <div class="p-4 space-y-4">
                            @foreach($valid_tugas as $tugas)
                            <a href="{{ route('QCViewTugas', ['id_tugas' => $tugas->ID_Tugas]) }}"
                                class="block bg-blue-50 text-gray-800 text-lg font-medium py-4 px-6 rounded-lg hover:bg-gray-300">
                                {{ $tugas->Judul }} <!-- Replace with actual attribute -->
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
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
                        <a href="#" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-700">Absensi</a>
                        <a href="#" class="block px-4 py-2 hover:bg-blue-700">Kegiatan</a>
                    </nav>
                </div>

                <!-- Content -->
                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Content goes here -->
                        <!-- <div class="p-6 text-gray-900">
                {{ __("Halo, QC!") }}
            </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
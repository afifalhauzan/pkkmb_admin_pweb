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
                        <a href="" class="block px-4 py-2 hover:bg-blue-700">Penugasan</a>
                        <a href="{{ route('mahasiswa') }}" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                        <a href="{{ route('absensi') }}" class="block px-4 py-2 hover:bg-blue-700">Absensi</a>
                        <a href="{{ route('kegiatan') }}" class="block px-4 py-2 hover:bg-blue-700">Kegiatan</a>
                    </nav>
                </div>

                <!-- Content -->
                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Flex container for Title and Form -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold">Tambah Absensi</h2>
                            </div>
                        </div>

                        <!-- Form Section -->
                        <!--  -->
                        <!-- Form Section -->
                        <form action="{{ route('addAbsensi') }}" method="POST" class="p-6">
                            @csrf

                            <!-- Kode Presensi -->
                            <div class="mb-4">
                                <label for="kode_presensi" class="block text-sm font-medium text-gray-700">Kode Presensi</label>
                                <input type="text" id="kode_presensi" name="kode_presensi" value="{{ old('kode_presensi') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('kode_presensi') border-red-500 @enderror"
                                    required>
                                @error('kode_presensi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama Kegiatan (Dropdown for Kegiatan_ID) -->
                            <div class="mb-4">
                                <label for="kegiatan_id" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
                                <select id="kegiatan_id" name="kegiatan_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('kegiatan_id') border-red-500 @enderror"
                                    required>
                                    <option value="">-- Pilih Nama Kegiatan --</option>
                                    @foreach ($kegiatan as $item)
                                    <option value="{{ $item->ID_Kegiatan }}" {{ old('ID_Kegiatan') == $item->ID_Kegiatan ? 'selected' : '' }}>
                                        {{ $item->Nama }} {{ $item->Tahun }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('kegiatan_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('description') border-red-500 @enderror"
                                    required>{{ old('description') }}</textarea>
                                @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Simpan
                                </button>
                            </div>
                        </form>



                    </div>
                </div>


            </div>

        </div>
    </div>
</x-app-layout>
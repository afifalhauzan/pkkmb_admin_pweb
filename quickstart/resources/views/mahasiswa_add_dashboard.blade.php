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
                        <a href="{{ route('absensi') }}" class="block px-4 py-2 hover:bg-blue-700">Absensi</a>
                        <a href="{{ route('kegiatan') }}" class="block px-4 py-2 hover:bg-blue-700">Kegiatan</a>
                    </nav>
                </div>

                <!-- Content -->
                <!-- Content -->
                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Flex container for Title and Form -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold">Tambah Mahasiswa</h2>
                            </div>
                        </div>

                        <!-- Form Section -->
                        <!--  -->
                        <form action="{{ route('AddMahasiswa') }}" method="POST" class="p-6">
                            @csrf

                            <!-- NIM -->
                            <div class="mb-4">
                                <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                                <input type="text" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim ?? '') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    {{ isset($mahasiswa) ? 'readonly' : 'required' }}>
                                @error('nim')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nama -->
                            <div class="mb-4">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('nama') border-red-500 @enderror"
                                    required>
                                @error('nama')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Cluster_ID -->
                            <div class="mb-4">
                                <label for="cluster_id" class="block text-sm font-medium text-gray-700">Cluster ID</label>
                                <input type="number" id="cluster_id" name="cluster_id" value="{{ old('cluster_id') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('cluster_id') border-red-500 @enderror"
                                    required>
                                @error('cluster_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Prodi -->
                            <div class="mb-4">
                                <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi</label>
                                <select id="prodi" name="prodi"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('prodi') border-red-500 @enderror"
                                    required>
                                    @php
                                    $prodiList = [
                                    'Teknik Informatika',
                                    'Teknik Komputer',
                                    'Sistem Informasi',
                                    'Teknologi Informasi',
                                    'Pendidikan Teknologi Informasi'
                                    ];
                                    @endphp
                                    @foreach($prodiList as $prodi)
                                    <option value="{{ $prodi }}" {{ old('prodi') == $prodi ? 'selected' : '' }}>
                                        {{ $prodi }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('prodi')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm @error('email') border-red-500 @enderror"
                                    required>
                                @error('email')
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
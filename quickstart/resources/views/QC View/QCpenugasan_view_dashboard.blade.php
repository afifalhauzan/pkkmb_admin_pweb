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
                        <a href="{{ route('penugasan') }}" class="block px-4 py-2 hover:bg-blue-700">Penugasan</a>
                        <a href="" class="block px-4 py-2 hover:bg-blue-700">Mahasiswa</a>
                    </nav>
                </div>

                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                        <div class="flex p-4 s">
                            <a href="{{ route('penugasan') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-lg shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-11.707a1 1 0 00-1.414 0L6.586 9.586a1 1 0 000 1.414l2.707 2.707a1 1 0 101.414-1.414L9.414 11H13a1 1 0 100-2H9.414l.293-.293a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                                Kembali
                            </a>

                            <div class="flex justify-between items-center p-4">
                                <h2 class="text-xl font-semibold">{{ $tugas->Judul }}</h2>
                            </div>
                        </div>

                        <div class="p-4 space-y-4">
                            <div class="p-4 bg-blue-50 rounded-lg shadow-sm">
                                <p class="text-gray-600 mt-2">{{ $tugas->Deskripsi }}</p>
                            </div>
                        </div>

                        <div class="p-6 space-y-4">
                            <h3 class="text-lg font-semibold text-gray-800">Mahasiswa yang Mengumpulkan:</h3>
                            @if($submittedMahasiswa->isEmpty())
                            <p class="text-gray-600">Belum ada mahasiswa yang mengumpulkan tugas ini.</p>
                            @else
                            <ul class="space-y-2">
                                @foreach($submittedMahasiswa as $mahasiswa)
                                <li class="p-4 bg-green-50 rounded-lg shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between space-y-4 md:space-y-0 md:space-x-4">
                                    <div class="flex-1">
                                        <p class="text-gray-800"><strong>Nama:</strong> {{ $mahasiswa->NamaMahasiswa }}</p>
                                        <p class="text-gray-800"><strong>NIM:</strong> {{ $mahasiswa->Mahasiswa_NIM }}</p>
                                        <p class="text-gray-600"><strong>File Tugas:</strong>
                                            <a href="{{ $mahasiswa->File_Tugas }}" class="text-blue-500 hover:underline" target="_blank">Lihat File</a>
                                        </p>
                                        <p class="text-gray-600">
                                            <strong>Waktu Pengumpulan:</strong>
                                            {{ $mahasiswa->time_submission ? $mahasiswa->time_submission->format('d M Y, H:i') : 'Belum Dikumpulkan' }}
                                        </p>
                                    </div>

                                    <div class="flex-shrink-0 w-full md:w-auto">
                                        <form action="{{ route('QCupdateNilai', ['id_tugas' => $mahasiswa->ID_Tugas, 'nim' => $mahasiswa->Mahasiswa_NIM]) }}"
                                            method="POST"
                                            class="flex flex-col space-y-2">
                                            @csrf
                                            @method('PUT') <p class="text-gray-600"><strong>Nilai:</strong> {{ $mahasiswa->Nilai ?? 'Belum Dinilai' }}</p>
                                            <input
                                                type="number"
                                                name="nilai"
                                                value="{{ $mahasiswa->Nilai ?? '' }}"
                                                placeholder="Masukkan Nilai"
                                                class="border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm" />

                                            <p class="text-gray-600 mt-2"><strong>Feedback:</strong> {{ $mahasiswa->text_feedback ?? 'Belum Ada Feedback' }}</p>
                                            <textarea
                                                name="text_feedback"
                                                rows="3"
                                                placeholder="Berikan Feedback"
                                                class="border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm resize-y">{{ $mahasiswa->text_feedback ?? '' }}</textarea>

                                            <button
                                                type="submit"
                                                class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 text-sm">
                                                Simpan
                                            </button>
                                        </form>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
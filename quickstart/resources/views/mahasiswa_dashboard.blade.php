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
                <div class="flex-1 p-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Flex container for Title and Form -->
                        <div class="flex justify-between items-center p-4 border-b">
                            <div class="flex-1">
                                <h2 class="text-xl font-semibold">Daftar Mahasiswa berdasarkan Cluster</h2>
                            </div>
                            <!-- Cek di Cluster Form on the right -->
                            <div class="ml-6 w-1/3">
                                <form id="clusterForm" method="GET">
                                    @csrf
                                    <label for="cluster" class="block text-sm font-medium text-gray-700">Cek di Cluster:</label>
                                    <div class="mt-2">
                                        <select id="cluster" name="cluster_id" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                            @foreach($clusters as $cluster)
                                            <option value="{{ $cluster->Cluster_ID }}">{{ $cluster->Cluster_ID }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600">Lihat Mahasiswa</button>
                                    </div>
                                </form>
                            </div>

                            <script>
                                document.getElementById("clusterForm").addEventListener("submit", function(event) {
                                    var selectedCluster = document.getElementById("cluster").value;
                                    this.action = "/dashboard/mahasiswa/" + selectedCluster; // Set the form action dynamically
                                });
                            </script>



                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
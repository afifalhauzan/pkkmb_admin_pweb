<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use App\Models\Cluster;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class GetMahasiswaByNimTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_mahasiswa_by_nim()
    {
        // Prepare the data
        $user = User::factory()->create(); // Create a user to link as Admin_NIM
        $cluster = Cluster::factory()->create(); // Create a cluster
        $mahasiswa = Mahasiswa::factory()->create([
            'NIM' => '22515010111006',
            'Admin_NIM' => $user->NIM,
            'Cluster_ID' => $cluster->Cluster_ID,
        ]);

        // Call the controller method (you can test the route or directly call the controller method)
        $response = $this->json('GET', '/api/mahasiswa/' . $mahasiswa->NIM);

        // Assert the response
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => [
                         'nim' => $mahasiswa->NIM,
                         'name' => $mahasiswa->Nama,
                         'qc_nim' => $user->NIM, // Should match the admin's NIM
                         'cluster_id' => $cluster->Cluster_ID,
                     ],
                 ]);
    }

    /** @test */
    public function it_returns_not_found_if_mahasiswa_does_not_exist()
    {
        // Simulate a request with a non-existent NIM
        $response = $this->json('GET', '/api/mahasiswa/22515010111099'); // A NIM that doesn't exist

        // Assert the response is 404 with an appropriate message
        $response->assertStatus(404)
                 ->assertJson([
                     'success' => false,
                     'message' => 'Mahasiswa not found',
                 ]);
    }
}

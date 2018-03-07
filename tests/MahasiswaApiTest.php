<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MahasiswaApiTest extends TestCase
{
    use MakeMahasiswaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMahasiswa()
    {
        $mahasiswa = $this->fakeMahasiswaData();
        $this->json('POST', '/api/v1/mahasiswas', $mahasiswa);

        $this->assertApiResponse($mahasiswa);
    }

    /**
     * @test
     */
    public function testReadMahasiswa()
    {
        $mahasiswa = $this->makeMahasiswa();
        $this->json('GET', '/api/v1/mahasiswas/'.$mahasiswa->id);

        $this->assertApiResponse($mahasiswa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMahasiswa()
    {
        $mahasiswa = $this->makeMahasiswa();
        $editedMahasiswa = $this->fakeMahasiswaData();

        $this->json('PUT', '/api/v1/mahasiswas/'.$mahasiswa->id, $editedMahasiswa);

        $this->assertApiResponse($editedMahasiswa);
    }

    /**
     * @test
     */
    public function testDeleteMahasiswa()
    {
        $mahasiswa = $this->makeMahasiswa();
        $this->json('DELETE', '/api/v1/mahasiswas/'.$mahasiswa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/mahasiswas/'.$mahasiswa->id);

        $this->assertResponseStatus(404);
    }
}

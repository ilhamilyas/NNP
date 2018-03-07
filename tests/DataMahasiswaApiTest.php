<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataMahasiswaApiTest extends TestCase
{
    use MakeDataMahasiswaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDataMahasiswa()
    {
        $dataMahasiswa = $this->fakeDataMahasiswaData();
        $this->json('POST', '/api/v1/dataMahasiswas', $dataMahasiswa);

        $this->assertApiResponse($dataMahasiswa);
    }

    /**
     * @test
     */
    public function testReadDataMahasiswa()
    {
        $dataMahasiswa = $this->makeDataMahasiswa();
        $this->json('GET', '/api/v1/dataMahasiswas/'.$dataMahasiswa->id);

        $this->assertApiResponse($dataMahasiswa->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDataMahasiswa()
    {
        $dataMahasiswa = $this->makeDataMahasiswa();
        $editedDataMahasiswa = $this->fakeDataMahasiswaData();

        $this->json('PUT', '/api/v1/dataMahasiswas/'.$dataMahasiswa->id, $editedDataMahasiswa);

        $this->assertApiResponse($editedDataMahasiswa);
    }

    /**
     * @test
     */
    public function testDeleteDataMahasiswa()
    {
        $dataMahasiswa = $this->makeDataMahasiswa();
        $this->json('DELETE', '/api/v1/dataMahasiswas/'.$dataMahasiswa->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dataMahasiswas/'.$dataMahasiswa->id);

        $this->assertResponseStatus(404);
    }
}

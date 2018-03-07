<?php

use App\Models\DataMahasiswa;
use App\Repositories\DataMahasiswaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DataMahasiswaRepositoryTest extends TestCase
{
    use MakeDataMahasiswaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DataMahasiswaRepository
     */
    protected $dataMahasiswaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dataMahasiswaRepo = App::make(DataMahasiswaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDataMahasiswa()
    {
        $dataMahasiswa = $this->fakeDataMahasiswaData();
        $createdDataMahasiswa = $this->dataMahasiswaRepo->create($dataMahasiswa);
        $createdDataMahasiswa = $createdDataMahasiswa->toArray();
        $this->assertArrayHasKey('id', $createdDataMahasiswa);
        $this->assertNotNull($createdDataMahasiswa['id'], 'Created DataMahasiswa must have id specified');
        $this->assertNotNull(DataMahasiswa::find($createdDataMahasiswa['id']), 'DataMahasiswa with given id must be in DB');
        $this->assertModelData($dataMahasiswa, $createdDataMahasiswa);
    }

    /**
     * @test read
     */
    public function testReadDataMahasiswa()
    {
        $dataMahasiswa = $this->makeDataMahasiswa();
        $dbDataMahasiswa = $this->dataMahasiswaRepo->find($dataMahasiswa->id);
        $dbDataMahasiswa = $dbDataMahasiswa->toArray();
        $this->assertModelData($dataMahasiswa->toArray(), $dbDataMahasiswa);
    }

    /**
     * @test update
     */
    public function testUpdateDataMahasiswa()
    {
        $dataMahasiswa = $this->makeDataMahasiswa();
        $fakeDataMahasiswa = $this->fakeDataMahasiswaData();
        $updatedDataMahasiswa = $this->dataMahasiswaRepo->update($fakeDataMahasiswa, $dataMahasiswa->id);
        $this->assertModelData($fakeDataMahasiswa, $updatedDataMahasiswa->toArray());
        $dbDataMahasiswa = $this->dataMahasiswaRepo->find($dataMahasiswa->id);
        $this->assertModelData($fakeDataMahasiswa, $dbDataMahasiswa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDataMahasiswa()
    {
        $dataMahasiswa = $this->makeDataMahasiswa();
        $resp = $this->dataMahasiswaRepo->delete($dataMahasiswa->id);
        $this->assertTrue($resp);
        $this->assertNull(DataMahasiswa::find($dataMahasiswa->id), 'DataMahasiswa should not exist in DB');
    }
}

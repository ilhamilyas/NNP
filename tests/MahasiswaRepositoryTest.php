<?php

use App\Models\Mahasiswa;
use App\Repositories\MahasiswaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MahasiswaRepositoryTest extends TestCase
{
    use MakeMahasiswaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MahasiswaRepository
     */
    protected $mahasiswaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->mahasiswaRepo = App::make(MahasiswaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMahasiswa()
    {
        $mahasiswa = $this->fakeMahasiswaData();
        $createdMahasiswa = $this->mahasiswaRepo->create($mahasiswa);
        $createdMahasiswa = $createdMahasiswa->toArray();
        $this->assertArrayHasKey('id', $createdMahasiswa);
        $this->assertNotNull($createdMahasiswa['id'], 'Created Mahasiswa must have id specified');
        $this->assertNotNull(Mahasiswa::find($createdMahasiswa['id']), 'Mahasiswa with given id must be in DB');
        $this->assertModelData($mahasiswa, $createdMahasiswa);
    }

    /**
     * @test read
     */
    public function testReadMahasiswa()
    {
        $mahasiswa = $this->makeMahasiswa();
        $dbMahasiswa = $this->mahasiswaRepo->find($mahasiswa->id);
        $dbMahasiswa = $dbMahasiswa->toArray();
        $this->assertModelData($mahasiswa->toArray(), $dbMahasiswa);
    }

    /**
     * @test update
     */
    public function testUpdateMahasiswa()
    {
        $mahasiswa = $this->makeMahasiswa();
        $fakeMahasiswa = $this->fakeMahasiswaData();
        $updatedMahasiswa = $this->mahasiswaRepo->update($fakeMahasiswa, $mahasiswa->id);
        $this->assertModelData($fakeMahasiswa, $updatedMahasiswa->toArray());
        $dbMahasiswa = $this->mahasiswaRepo->find($mahasiswa->id);
        $this->assertModelData($fakeMahasiswa, $dbMahasiswa->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMahasiswa()
    {
        $mahasiswa = $this->makeMahasiswa();
        $resp = $this->mahasiswaRepo->delete($mahasiswa->id);
        $this->assertTrue($resp);
        $this->assertNull(Mahasiswa::find($mahasiswa->id), 'Mahasiswa should not exist in DB');
    }
}

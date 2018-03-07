<?php

use Faker\Factory as Faker;
use App\Models\DataMahasiswa;
use App\Repositories\DataMahasiswaRepository;

trait MakeDataMahasiswaTrait
{
    /**
     * Create fake instance of DataMahasiswa and save it in database
     *
     * @param array $dataMahasiswaFields
     * @return DataMahasiswa
     */
    public function makeDataMahasiswa($dataMahasiswaFields = [])
    {
        /** @var DataMahasiswaRepository $dataMahasiswaRepo */
        $dataMahasiswaRepo = App::make(DataMahasiswaRepository::class);
        $theme = $this->fakeDataMahasiswaData($dataMahasiswaFields);
        return $dataMahasiswaRepo->create($theme);
    }

    /**
     * Get fake instance of DataMahasiswa
     *
     * @param array $dataMahasiswaFields
     * @return DataMahasiswa
     */
    public function fakeDataMahasiswa($dataMahasiswaFields = [])
    {
        return new DataMahasiswa($this->fakeDataMahasiswaData($dataMahasiswaFields));
    }

    /**
     * Get fake data of DataMahasiswa
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDataMahasiswaData($dataMahasiswaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nim' => $fake->word,
            'nama' => $fake->word,
            'kelas' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $dataMahasiswaFields);
    }
}

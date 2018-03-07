<?php

namespace App\Repositories;

use App\Models\Mahasiswa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MahasiswaRepository
 * @package App\Repositories
 * @version March 3, 2018, 8:32 am UTC
 *
 * @method Mahasiswa findWithoutFail($id, $columns = ['*'])
 * @method Mahasiswa find($id, $columns = ['*'])
 * @method Mahasiswa first($columns = ['*'])
*/
class MahasiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'nim',
        'prodi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Mahasiswa::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\DataMahasiswa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataMahasiswaRepository
 * @package App\Repositories
 * @version November 20, 2017, 2:06 am UTC
 *
 * @method DataMahasiswa findWithoutFail($id, $columns = ['*'])
 * @method DataMahasiswa find($id, $columns = ['*'])
 * @method DataMahasiswa first($columns = ['*'])
*/
class DataMahasiswaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nim',
        'nama',
        'kelas'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataMahasiswa::class;
    }
}

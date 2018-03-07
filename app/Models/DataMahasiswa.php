<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataMahasiswa
 * @package App\Models
 * @version November 20, 2017, 2:06 am UTC
 *
 * @property string nim
 * @property string nama
 * @property string kelas
 */
class DataMahasiswa extends Model
{
    use SoftDeletes;

    public $table = 'data_mahasiswas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nim',
        'nama',
        'kelas'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nim' => 'string',
        'nama' => 'string',
        'kelas' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

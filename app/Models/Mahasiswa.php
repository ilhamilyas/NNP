<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Mahasiswa
 * @package App\Models
 * @version March 3, 2018, 8:32 am UTC
 *
 * @property string nama
 * @property string nim
 * @property string prodi
 */
class Mahasiswa extends Model
{
    use SoftDeletes;

    public $table = 'mahasiswas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'nim',
        'prodi'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'nim' => 'string',
        'prodi' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

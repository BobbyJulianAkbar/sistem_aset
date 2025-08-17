<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class propertiModel extends Model
{
    protected $table = 'properti';
    protected $primaryKey = 'id_properti';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_properti',
        'luas_properti',
        'tipe_properti',
        'harga_properti',
        'status_properti'
    ];
}

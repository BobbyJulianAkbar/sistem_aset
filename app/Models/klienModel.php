<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class klienModel extends Model
{
    protected $table = 'klien';
    protected $primaryKey = 'id_klien';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_klien',
        'no_hp_klien',
        'email_klien',
    ];
}

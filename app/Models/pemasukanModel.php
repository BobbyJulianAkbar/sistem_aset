<?php

namespace App\Models;
use App\Models\klienModel;
use App\Models\propertiModel;

use Illuminate\Database\Eloquent\Model;

class pemasukanModel extends Model
{
    protected $table = 'pemasukan';
    protected $primaryKey = 'id_pemasukan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_klien',
        'id_properti',
        'tipe_pembayaran',
        'jlh_pembayaran',
    ];

    public function klien()
    {
        return $this->belongsTo(klienModel::class, 'id_klien');
    }

    public function properti()
    {
        return $this->belongsTo(propertiModel::class, 'id_properti');
    }
}

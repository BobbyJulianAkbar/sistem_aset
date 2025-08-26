<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cicilanModel extends Model
{
    protected $table = 'cicilan';
    protected $primaryKey = 'id_cicilan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_pemasukan',
        'jumlah_cicilan',
        'tanggal_bayar',
    ];

    public function pemasukan()
    {
        return $this->belongsTo(pemasukanModel::class, 'id_pemasukan');
    }
}
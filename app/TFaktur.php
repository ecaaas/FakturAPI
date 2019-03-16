<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TFaktur extends Model
{
    protected $table = 't_faktur';

    protected $fillable = [
        'nama_barang', 'harga', 'qty', 'total'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBeli extends Model
{
    protected $table = 'r_pembelian';
    protected $fillable = ['id_penjualan', 'id_produk', 'qty'];
}

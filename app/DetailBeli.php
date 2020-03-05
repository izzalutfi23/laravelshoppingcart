<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailBeli extends Model
{
    protected $table = 'r_pembelian';
    protected $fillable = ['id_penjualan', 'id_produk', 'qty'];
    protected $primaryKey = 'id';

    public function produk(){
    	return $this->belongsTo('App\Produk', 'id_produk', 'id');
    }

    public function penjualan(){
    	return $this->belongsTo('App\Penjualan', 'id_penjualan', 'id');
    }
}

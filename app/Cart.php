<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['id', 'id_produk', 'kasir', 'qty'];
    protected $primaryKey = 'id';

    public function produk(){
    	return $this->belongsTo('App\Produk', 'id_produk', 'id');
    }
}

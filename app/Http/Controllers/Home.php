<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
    	$data = [
    		['id' => 1, 'nama' => 'Buku', 'qty'> '10' ],
    		['id' => 2, 'nama' => 'Bulpoin', 'qty'> '5' ]
    	];

    	return view('produk');
    }

    public function keranjang(){
    	return view('keranjang');
    }
}

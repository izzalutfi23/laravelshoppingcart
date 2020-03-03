<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Cart;
use App\DetailBeli;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
    	$produk = Produk::all();
        $data = array(
            'produk' => $produk
        );

    	return view('produk', $data);
    }

    public function addcart(Produk $produk){
        $cart = Cart::where('id_produk', $produk->id)->get();
        $tcart = $cart->count();

        if($tcart > 0){
            Cart::where('id_produk', $produk->id)->increment('qty', 1);
            Produk::where('id', $produk->id)->decrement('qty', 1);
        }
        else{
            Cart::create(['id_produk' => $produk->id, 'qty' => 1]);
            Produk::where('id', $produk->id)->decrement('qty', 1);
        }

        return redirect('/keranjang');
        
    }

    public function keranjang(){
        $cart = Cart::all();

        $data['cart'] = $cart;

        return view('keranjang', $data);
    }

    public function delcart(Cart $cart){
        Produk::where('id', $cart->id_produk)->increment('qty', $cart->qty);
        Cart::destroy('id', $cart->id);

        return redirect('/keranjang');
    }

    public function checkout(){
        $cart = Cart::select('id_produk', 'qty')->get();

        // Insert penjualan
        $penjualan = new \App\Penjualan;

        $penjualan->kasir = 'izza';
        $penjualan->tgl_transaksi = date('Y-m-d');
        $penjualan->save();

        foreach ($cart as $key) {
            DetailBeli::insert(['id_penjualan' => $penjualan->id, 'id_produk' => $key->id_produk, 'qty' => $key->qty]);
        }

        return $cart;
    }
}

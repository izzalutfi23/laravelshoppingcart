<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Cart;
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
}

@extends('layout/main')
@section('title', 'Produk')
@section('container')
<div class="container" style="margin-top: 30px;">
	<h1>Keranjang</h1><br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Produk</th>
				<th scope="col">Jumlah</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($cart as $data)
			<tr>
				<th scope="row">{{$loop->iteration}}</th>
				<td>{{$data->produk->nama_produk}}</td>
				<td>{{$data->qty}}</td>
				<td>
					<a href="{{url('/delcart/'.$data->id)}}"><button class="btn btn-danger">Hapus</button></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<a href="{{url('/checkout')}}"><button class="btn btn-success float-right mt-5">Checkout >></button></a>
</div>
@endsection()
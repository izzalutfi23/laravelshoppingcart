@extends('layout/main')
@section('title', 'Produk')
@section('container')
<div class="container" style="margin-top: 30px;">
	<h1>Produk</h1><br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Nama Barang</th>
				<th scope="col">Stok</th>
				<th scope="col">Harga</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($produk as $data)
			<tr>
				<th scope="row">{{$loop->iteration}}</th>
				<td>{{$data->nama_produk}}</td>
				<td>{{$data->qty}}</td>
				<td>Rp {{number_format($data->harga)}}</td>
				<td>
					<a href="{{url('/addcart/'.$data->id)}}"><button class="btn btn-success">Tambah ke Keranjang</button></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection()
@extends('layout/main')
@section('title', 'Pembelian')
@section('container')
<div class="container" style="margin-top: 30px;">
	<h1>Pembelian</h1><br>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">Kasir</th>
				<th scope="col">Tanggal Transaksi</th>
				<th scope="col">Detail Transaksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($penjualan as $data)
			<tr>
				<th scope="row">{{$loop->iteration}}</th>
				<td>{{$data->kasir}}</td>
				<td>{{date('d M Y', strtotime($data->tgl_transaksi))}}</td>
				<td>
					<button class="btn btn-success" data-toggle="modal" data-target="#detail{{$data->id}}">Detail</button>
				</td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>

@foreach($penjualan as $key)
<!-- Detail Beli -->
<div class="modal fade" id="detail{{$key->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title {{$key->id}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah</th>
						</tr>
					</thead>
					<tbody>
						@php
							$djual = \App\DetailBeli::where('id_penjualan', $key->id)->get();
						@endphp
						@foreach($djual as $detail)
						<tr>
							<th scope="row">{{$loop->iteration}}</th>
							<td>{{$detail->produk->nama_produk}}</td>
							<td>{{$detail->qty}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- End Detail Produk -->
@endforeach

@endsection()
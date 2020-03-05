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

			<!-- Detail Beli -->
			<div class="modal fade" id="detail{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="table-responsive">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th><input type="checkbox" id="toggleChkSelFabricante" name="toggleChkSelFabricante"></th>
										<th>Fabricante</th>
									</tr>
								</thead>
								<tbody id="selFabricanteBody"><tr data-idproductosolicitud="1" data-id="1"><td><div class="checkbox"><label><input type="checkbox" name="fabLinkChoice[]" value="1"></label></div></td><td>Dist1</td><td>DR</td><td class="has_pais fabTd-1"><span id="14">México</span>, <span id="15">Nicaragua</span>, <span id="16">Panamá</span></td><td>1212212</td></tr><tr data-idproductosolicitud="1" data-id="1"><td><div class="checkbox"><label><input type="checkbox" name="fabLinkChoice[]" value="1"></label></div></td><td>Dist1</td><td>DR</td><td class="has_pais fabTd-1"><span id="14">México</span>, <span id="15">Nicaragua</span>, <span id="16">Panamá</span></td><td>1212212</td></tr></tbody>
							</table>
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>

			@endforeach
		</tbody>
	</table>
</div>
@endsection()
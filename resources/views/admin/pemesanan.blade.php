@extends('layout.admin')

@section('content')
    <div class="row">
        <h1 class="col-md12">
        	Pemesanan
        </h1>
        <div class="col-md-12">
        	<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="text-info">Menunggu Konfirmasi</h3>
						</div>
						<div class="card-body">
							<table class="table table-striped table-dark mb-2">
								<thead>
									<tr>
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col">No tlp</th>
									<th scope="col">Kota</th>
									<th scope="col">Workshop</th>
									<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									
									@foreach ( $unProcesseds as $unProcessed )
										<tr>
											<th scope="row" class="text-white">1</th>
											<td>{{$unProcessed['nama']}}</td>
											<td>{{$unProcessed['tlp']}}</td>
											<td>{{$unProcessed['alamat']}}</td>
											<td>{{$unProcessed['workshop'] == null ? 'Event Deleted' : $unProcessed['workshop']['nama']}}</td>
											<td>
												<button class="btn-sm btn-block btn-success" data-toggle="modal" data-target="#detail-{{$unProcessed['id']}}">Details</button>
												<a href="{{ route('pemesanan.process',['id' => $unProcessed['id']]) }}" class="btn-sm btn-block btn-warning">Process</a>
												<a href="{{ route('pemesanan.delete',['id' => $unProcessed['id'] ]) }}" class="btn-sm btn-block btn-danger">Delete</a>
											</td>
										</tr>

										<!-- Modal -->
										<div class="modal fade modal-black" id="detail-{{$unProcessed['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Details</h5>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
												<i class="tim-icons icon-simple-remove"></i>
												</button>
											</div>
											<div class="modal-body">
												<h5>
													catatan:
												</h5>
												<p>
													{{$unProcessed['catatan']}}
												</p>
												<sub>
													tlp: <span class="text-success">{{$unProcessed['tlp']}}</span>
												</sub>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
											</div>
										</div>
										</div>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h3 class="text-success">Terproses</h3>
						</div>
						<div class="card-body">
							<table class="table table-striped table-dark mb-2">
								<thead>
									<tr>
									<th scope="col">No</th>
									<th scope="col">Nama</th>
									<th scope="col">No tlp</th>
									<th scope="col">Kota</th>
									<th scope="col">Workshop</th>
									<th scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>		
									@foreach ( $processeds as $processed )
										<tr>
											<th scope="row" class="text-white">1</th>
											<td>{{$processed['nama']}}</td>
											<td>{{$processed['tlp']}}</td>
											<td>{{$processed['alamat']}}</td>
											<td>{{$processed['workshop'] == null ? 'Event Deleted' : $processed['workshop']['nama']}}</td>
											<td>
												<a href="{{ route('pemesanan.process',['id' => $processed['id']]) }}" class="btn-sm btn-block btn-warning">Unprocess</a>
												<a href="{{ route('pemesanan.delete',['id' => $processed['id'] ]) }}" class="btn-sm btn-block btn-danger">Delete</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
        	</div>
        </div>
    </div>
@endsection
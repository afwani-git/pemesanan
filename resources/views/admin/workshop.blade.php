@extends('layout.admin')

@section('content')
     <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card p-4">
            	<div class="row d-flex align-items-center justify-content-center">
            		<div class="col-md-12">
            			<h1 class="">
            				List Workshop 
            			</h1>
            		</div>
					<div class="col-md-12">
						<table class="table table-striped table-dark mb-2">
						  <thead>
						    <tr>
						      <th scope="col">No</th>
						      <th scope="col">Nama</th>
							  <th scope="col">Harga</th>
						      <th scope="col">Instruktor</th>
						      <th scope="col">Jam/taggal</th>
						      <th scope="col">Deskripsi</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <tbody>
							@foreach ($workshops as $workshop)
								<tr>
									<th scope="row" class="text-white">{{$no++}}</th>
									<td>{{$workshop['nama']}}</td>
									<td>{{$workshop['harga']}}</td>
									<td>{{$workshop['instruktor']}}</td>
									<td>{{$workshop['tanggal']}}</td>
									<td>{{ Illuminate\Support\Str::length($workshop['deskripsi']) > 20 ? substr($workshop['deskripsi'], 0 ,15)."..." :$workshop['deskripsi'] }}</td>
									<td>
										<button class="btn btn-warning" data-toggle="modal" data-target="#update-{{$workshop['id']}}">Ubah</button>
										<a href="{{ route('workshop.delete', ['id' => $workshop['id']]) }}" class="btn btn-danger">Hapus</a>
									</td>
						    	</tr>
									<!-- update  -->
									<div id="update-{{$workshop['id']}}" class="modal modal-black fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-body">
												<div class="card p-8">
													<div class="card-body">
														<form enctype="multipart/form-data" method="POST" action="{{ route('workshop.update',['id' => $workshop['id']]) }}">
															@csrf
															<div class="form-group">
																<label for="name">Nama workshop</label>
																<input value="{{$workshop['nama']}}" name="nama" type="text" class="form-control" id="name"  placeholder="name">
															</div>
															<label class="d-block" for="name">Image</label>
															<input name="gambar" type="file" class="form-control" id="gambar"  placeholder="name">
															<div class="form-group">
																<label for="harga">Harga</label>
																<input value="{{$workshop['harga']}}" name="harga"  type="text" class="form-control" id="harga"  placeholder="...">
															</div>
															<div class="form-group">
																<label for="name">Instruktor</label>
																<input value="{{$workshop['instruktor']}}" name="instruktor"  type="text" class="form-control" id="name"  placeholder="name">
															</div>
															<div class="form-group">
																<label for="name">Jam tanggal</label>
																<input value="{{$workshop['tanggal']}}" name="tanggal" type="date" class="form-control" id="name"  placeholder="name">
															</div>
															<div class="form-group">
																<label for="name">Deskripsi</label>
																<textarea  name="deskripsi" class="form-control">{{$workshop['deskripsi']}}</textarea>
															</div>
															<button type="submit" class="btn btn-primary">Update</button>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									</div>

							@endforeach
						  </tbody>
						</table>
					</div>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-data">
						Tambah Data
					</button>     		
            	</div>
            </div>
        </div>

        <!-- Modal tambah data -->
        <div id="tambah-data" class="modal modal-black fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-body">
					<div class="card p-8">
						<div class="card-body">
							<form method="post" enctype="multipart/form-data" action="{{ route('workshop.add') }}">
								@csrf
								<div class="form-group">
									<label for="name">Nama workshop</label>
									<input name="nama" type="text" class="form-control" id="name"  placeholder="name">
								</div>
								<div class="form-group">
									<label for="harga">Harga</label>
									<input  name="harga"  type="text" class="form-control" id="harga"  placeholder="...">
								</div>
								<label class="d-block" for="name">Image</label>
								<input name="gambar" type="file" class="form-control" id="gambar"  placeholder="name">
								<div class="form-group">
									<label for="name">Instruktor</label>
									<input name="instruktor"  type="text" class="form-control" id="name"  placeholder="name">
								</div>
								<div class="form-group">
									<label for="name">Jam tanggal</label>
									<input name="tanggal" type="date" class="form-control" id="name"  placeholder="name">
								</div>
								<div class="form-group">
									<label for="name">Deskripsi</label>
									<textarea name="deskripsi" class="form-control"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>
				</div>
			</div>
		   </div>
		</div>
@endsection

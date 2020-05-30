@extends('layouts.IPS')

@section('content')

<div class="card shadow ">
    <div class="card-header text-center">
       <h4>Data siswa yang diterima melalui SNMPTN</h4>
    </div>

    <div class="card-body">
       {{-- notifikasi--}}
		@if (session('berhasil'))
		<div class="alert alert-success alert-dismissible fade show">
			<strong>{{ session('berhasil')}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
		</div>
		@endif
		@if (session('gagal'))
		<div class="alert alert-danger alert-dismissible fade show">
			<strong>{{ session('gagal')}}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
		</div>
		@endif
            
        <div class="row">
            <div class="col-md">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">
                  <i class="fas fa-fw fa-plus"></i>
                  <span>Tambah Data</span> 
                </button>                

        		<!-- Import Excel -->
        		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        			<div class="modal-dialog" role="document">
        				<form method="POST" action="{{ route('importIPS') }}" enctype="multipart/form-data">
        					
        					<div class="modal-content">
        						<div class="modal-header">
        							<h5 class="modal-title" id="exampleModalLabel">Mengunggah Data Siswa</h5>
        						</div>
        						<div class="modal-body">
        							{{ csrf_field() }}
                                    <div class="container">
                                        <div class="row">
                                            <p>
                                                Silahkan mengunggah file excel dengan mengikuti format seperti pada contoh file
                                                <a href="{{ route('formatFileIPS') }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-fw fa-download"></i>
                                                    <span>Unduh Format File</span>
                                                </a>  
                                            </p>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="file" name="file" required="required">
                                            </div>
                                        </div>
                                    </div>
        						</div>
        						<div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Unggah</button>
        							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        						</div>
        					</div>
        				</form>
        			</div>
        		</div>
            
            @if (session('ada')) 
 
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAll">
                    <i class="fas fa-fw fa-trash"></i>
                    <span>Hapus Seluruh Data</span> 
                </button>
            </div>

            <div class="modal fade" id="deleteAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                      <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            </div>
                            <div class="modal-body">
                                <label>Apakah anda yakin ingin menghapus seluruh data?</label>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('deleteIPS') }}" class="btn btn-danger">Ya</a>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-md-4"> 
                <form action="{{ route('cariSiswaIPS') }}" method="GET">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <select class="form-control" name="field">
                                <option value="nisn">NISN</option>
                                <option value="nama">Nama</option>
                                <option value="angkatan">Angkatan</option>
                                <option value="ptn">PTN</option>
                                <option value="jurusan">Jurusan</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="cari"  value="{{ old('cari') }}">
                        <button class="btn btn-info" type="submit">Cari</button>
                    </div>           
                </form>
            </div>
        </div> 

        @endif
        <div class="table-responsive">
            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Angkatan</th>
                        <th>Nilai</th>
                        <th>PTN</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($siswaIPS as $data)
                    <tr>
                        <td>{{$data->nisn}}</td>
                        <td>{{$data->nama}}</td>
                        <td>{{$data->angkatan}}</td>
                        <td> 
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-info-{{ $data->id }}">
                                Lihat Nilai
                            </button>

                        <div class="modal fade" id="modal-info-{{ $data->id }}" tabingex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Informasi Nilai</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table class="table" >
                                                    <thead>
                                                        <tr>
                                                            <th>Semester</th>
                                                            <th>Bahasa Indonesia</th>
                                                            <th>Bahasa Inggris</th>
                                                            <th>Matematika</th>
                                                            <th>Geografi</th>
                                                            <th>Ekonomi</th>
                                                            <th>Sosiologi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{$data->ind1}}</td>
                                                            <td>{{$data->ing1}}</td>
                                                            <td>{{$data->mat1}}</td>
                                                            <td>{{$data->geo1}}</td>
                                                            <td>{{$data->eko1}}</td>
                                                            <td>{{$data->sos1}}</td>

                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>{{$data->ind2}}</td>
                                                            <td>{{$data->ing2}}</td>
                                                            <td>{{$data->mat2}}</td>
                                                            <td>{{$data->geo2}}</td>
                                                            <td>{{$data->eko2}}</td>
                                                            <td>{{$data->sos2}}</td>

                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>{{$data->ind3}}</td>
                                                            <td>{{$data->ing3}}</td>
                                                            <td>{{$data->mat3}}</td>
                                                            <td>{{$data->geo3}}</td>
                                                            <td>{{$data->eko3}}</td>
                                                            <td>{{$data->sos3}}</td>

                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>{{$data->ind4}}</td>
                                                            <td>{{$data->ing4}}</td>
                                                            <td>{{$data->mat4}}</td>
                                                            <td>{{$data->geo4}}</td>
                                                            <td>{{$data->eko4}}</td>
                                                            <td>{{$data->sos4}}</td>

                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>{{$data->ind5}}</td>
                                                            <td>{{$data->ing5}}</td>
                                                            <td>{{$data->mat5}}</td>
                                                            <td>{{$data->geo5}}</td>
                                                            <td>{{$data->eko5}}</td>
                                                            <td>{{$data->sos5}}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>                                                         
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        </td>
                        <td>{{$data->ptn}}</td>
                        <td>{{$data->jurusan}}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="8" class="text-center">Tidak terdapat data</td>  
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- pagination -->
		{{ $siswaIPS->links() }}
    </div>
</div>
@endsection

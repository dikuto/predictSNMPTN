@extends('layouts.IPA')

@section('content')

<div class="card text-center">
    <div class="card-header py-3">
        Daftar PTN berdasarkan nilai
    </div>
    <div class="card-body">
        <div class="container col-lg-6 text-center">
            @if (session('tidak ada')) 
            <div class="alert alert-warning" role="alert">
              Untuk dapat mencari daftar PTN dan Jurusan, Masukan data siswa terlebih dahulu
            </div>
            @else     
            <div class="row">
                <p>Berikut pencarian PTN dan Jurusan berdasarkan nilai</p>
            </div>
            <div class="row"> 
                <form class="form-inline" action="{{ route('cariPTN_IPA') }}" method="GET">
                    <div class="form-group">
                        <select class="form-control" name="mataPelajaran">
                            <option value="ind">Bahasa Indonesia</option>
                            <option value="ing">Bahasa Inggris</option>
                            <option value="mat">Matematika</option>
                            <option value="fis">Fisika</option>
                            <option value="kima">Kimia</option>
                            <option value="bio">Biologi</option>
                        </select>
                        <select class="form-control" name="semester">
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                        </select>
                        <select class="form-control" name="simbol">
                            <option value=">="> >= </option>
                            <option value="<="> <= </option>
                        </select>
                        <input type="number" class="form-control" name="nilai"  value="{{ old('nilai') }}" min="1" max="100">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
            @endif
            @isset($dataPTN)
            <div class="row">
                <div class="alert alert-primary" role="alert">
                    {{$info}}
                </div>
            </div>
            <div class="row bg-light">        
                <table class="table">
                    <thead>
                        <tr>
                            <th>PTN</th>
                            <th>Jurusan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataPTN as $s)
                        <tr>
                            <td>{{$s->ptn}}</td>
                            <td>{{$s->jurusan}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td>Tidak ada ptn yang ditemukan</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @endisset
        </div>
    </div>
</div>
@endsection
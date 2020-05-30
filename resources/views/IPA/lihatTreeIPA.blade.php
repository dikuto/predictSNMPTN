@extends('layouts.IPA')

@section('content')

<div class="card">
    <div class="card-header text-center py-3">
        Pilih model yang akan digunakan untuk membuat tree
    </div>
    <div class="card-body ">      
        @if (session('tidak ada')) 
        <div class="alert alert-warning" role="alert">
          Untuk dapat melihat hasil pohon keputusan, Masukan data siswa terlebih dahulu
        </div>
        @else   
        <form method="POST" action="{{ route('membuatTreeIPA') }}">
            @csrf            
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Model </label>
                <div class="col-md-4">
                    <select class="form-control" name="model">    
                        @foreach($models as $model) 
                            <option value="{{$model}}">{{ $model }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 text-center">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        @endif        
    </div>
</div>
@endsection
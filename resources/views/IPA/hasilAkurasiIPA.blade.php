@extends('layouts.IPA')

@section('content')

<div class="card">
    <div class="card-header text-center py-3">
        Hasil akurasi dari model {{$model}}
    </div>
    <div class="card-body ">      
        @isset($dataAkurasi)
   
        <div class="row bg-light"> 
            <span style="font-size: 14px">
            @foreach($dataAkurasi as $data)     
            <pre>{{$data}} </pre>  
            @endforeach
            </span>
        </div>
        @endisset
        
    </div>
</div>
@endsection
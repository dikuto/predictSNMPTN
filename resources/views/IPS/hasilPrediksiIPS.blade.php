@extends('layouts.IPS')

@section('content')

<div class="card">
    <div class="card-header py-3">
        Hasil Prediksi
    </div>
    <div class="card-body">
        @isset($prediksi,$ketepatan,$data)
        @if (session('lulus'))
        <div class="alert alert-success text-center" role="alert">
           Hasil prediksi {{ $prediksi }} dengan ketepatan {{ $ketepatan }}%!
        </div>
        @else
        <div class="alert alert-danger text-center" role="alert">
           Hasil prediksi {{ $prediksi }} dengan ketepatan {{ $ketepatan }}%!
        </div>
        @endif
        <table class="table">
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
                    <td>{{$data['ind1']}}</td>
                    <td>{{$data['ing1']}}</td>
                    <td>{{$data['mat1']}}</td>
                    <td>{{$data['geo1']}}</td>
                    <td>{{$data['eko1']}}</td>
                    <td>{{$data['sos1']}}</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>{{$data['ind2']}}</td>
                    <td>{{$data['ing2']}}</td>
                    <td>{{$data['mat2']}}</td>
                    <td>{{$data['geo2']}}</td>
                    <td>{{$data['eko2']}}</td>
                    <td>{{$data['sos2']}}</td>
                </tr>
  
                <tr>
                    <td>3</td>
                    <td>{{$data['ind3']}}</td>
                    <td>{{$data['ing3']}}</td>
                    <td>{{$data['mat3']}}</td>
                    <td>{{$data['geo3']}}</td>
                    <td>{{$data['eko3']}}</td>
                    <td>{{$data['sos3']}}</td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>{{$data['ind4']}}</td>
                    <td>{{$data['ing4']}}</td>
                    <td>{{$data['mat4']}}</td>
                    <td>{{$data['geo4']}}</td>
                    <td>{{$data['eko4']}}</td>
                    <td>{{$data['sos4']}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>{{$data['ind5']}}</td>
                    <td>{{$data['ing5']}}</td>
                    <td>{{$data['mat5']}}</td>
                    <td>{{$data['geo5']}}</td>
                    <td>{{$data['eko5']}}</td>
                    <td>{{$data['sos5']}}</td>
                </tr>

            </tbody>
        </table>
        @endisset
        
    </div>
</div>
@endsection

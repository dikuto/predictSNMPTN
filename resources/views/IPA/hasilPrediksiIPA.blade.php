@extends('layouts.IPA')

@section('content')

<div class="card">
    <div class="card-header py-3">
        Hasil Prediksi
    </div>
    <div class="card-body">
        @isset($prediksi,$ketepatan,$data)
        @if (session('lulus'))
        <div class="alert alert-success text-center" role="alert">
           Hasil prediksi {{ $prediksi }} dengan ketepatan {{ $ketepatan }}!
        </div>
        @else
        <div class="alert alert-danger text-center" role="alert">
           Hasil prediksi {{ $prediksi }} dengan ketepatan {{ $ketepatan }}!
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Semester</th>
                    <th>Bahasa Indonesia</th>
                    <th>Bahasa Inggris</th>
                    <th>Matematika</th>
                    <th>Fisika</th>
                    <th>Kimia</th>
                    <th>Biologi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$data['ind1']}}</td>
                    <td>{{$data['ing1']}}</td>
                    <td>{{$data['mat1']}}</td>
                    <td>{{$data['fis1']}}</td>
                    <td>{{$data['kim1']}}</td>
                    <td>{{$data['bio1']}}</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>{{$data['ind2']}}</td>
                    <td>{{$data['ing2']}}</td>
                    <td>{{$data['mat2']}}</td>
                    <td>{{$data['fis2']}}</td>
                    <td>{{$data['kim2']}}</td>
                    <td>{{$data['bio2']}}</td>
                </tr>
  
                <tr>
                    <td>3</td>
                    <td>{{$data['ind3']}}</td>
                    <td>{{$data['ing3']}}</td>
                    <td>{{$data['mat3']}}</td>
                    <td>{{$data['fis3']}}</td>
                    <td>{{$data['kim3']}}</td>
                    <td>{{$data['bio3']}}</td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>{{$data['ind4']}}</td>
                    <td>{{$data['ing4']}}</td>
                    <td>{{$data['mat4']}}</td>
                    <td>{{$data['fis4']}}</td>
                    <td>{{$data['kim4']}}</td>
                    <td>{{$data['bio4']}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>{{$data['ind5']}}</td>
                    <td>{{$data['ing5']}}</td>
                    <td>{{$data['mat5']}}</td>
                    <td>{{$data['fis5']}}</td>
                    <td>{{$data['kim5']}}</td>
                    <td>{{$data['bio5']}}</td>
                </tr>

            </tbody>
        </table>
        @endisset
        
    </div>
</div>
@endsection

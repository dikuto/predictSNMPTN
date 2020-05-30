@extends('layouts.IPS')

@section('content')
<div class="card shadow text-center">
    <div class="card-header py-3">
        Buat Prediksi
    </div>
    <div class="card-body">
        @if (session('tidak ada')) 
        <div class="alert alert-warning" role="alert">
          Untuk dapat membuat prediksi dibutuhkan data siswa, Masukan data siswa terlebih dahulu
        </div>
        @else       
        <form method="POST" action="{{ route('membuatPrediksiIPS') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Model </label>
                <div class="col-md-5">
                    <select class="form-control" name="model">    
                        @foreach($models as $model) 
                        <option value="{{$model}}">{{ $model }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Semester </label>
                <label for="name" class="col-md-1 col-form-label ">1 </label>
                <label for="name" class="col-md-1 col-form-label ">2 </label>
                <label for="name" class="col-md-1 col-form-label ">3 </label>
                <label for="name" class="col-md-1 col-form-label ">4 </label>
                <label for="name" class="col-md-1 col-form-label ">5 </label>
                <label for="name" class="col-md-4 col-form-label text-md-right">Bahasa Indonesia </label>

                <div class="col-md-1">
                    <input id="ind1" type="number" class="form-control{{ $errors->has('ind1') ? ' is-invalid' : '' }}" name="ind1" value="{{ old('ind1') }}" required autocomplete="ind1"  min="1" max="100" autofocus>

                    @if ($errors->has('ind1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ind1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ind2" type="number" class="form-control{{ $errors->has('ind2') ? ' is-invalid' : '' }}" name="ind2" value="{{ old('ind2') }}" required autocomplete="ind2"  min="1" max="100" >

                    @if ($errors->has('ind2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ind2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ind3" type="number" class="form-control{{ $errors->has('ind3') ? ' is-invalid' : '' }}" name="ind3" value="{{ old('ind3') }}" required autocomplete="ind3"  min="1" max="100" >

                    @if ($errors->has('ind3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ind3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ind4" type="number" class="form-control{{ $errors->has('ind4') ? ' is-invalid' : '' }}" name="ind4" value="{{ old('ind4') }}" required autocomplete="ind4"  min="1" max="100" >

                    @if ($errors->has('ind4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ind4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ind5" type="number" class="form-control{{ $errors->has('ind5') ? ' is-invalid' : '' }}" name="ind5" value="{{ old('ind5') }}" required autocomplete="ind5"  min="1" max="100" >

                    @if ($errors->has('ind5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ind5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Bahasa Inggris </label>

                <div class="col-md-1">
                    <input id="ing1" type="number" class="form-control{{ $errors->has('ing1') ? ' is-invalid' : '' }}" name="ing1" value="{{ old('ing1') }}" required autocomplete="ing1"  min="1" max="100" >

                    @if ($errors->has('ing1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ing1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ing2" type="number" class="form-control{{ $errors->has('ing2') ? ' is-invalid' : '' }}" name="ing2" value="{{ old('ing2') }}" required autocomplete="ing2"  min="1" max="100" >

                    @if ($errors->has('ing2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ing2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ing3" type="number" class="form-control{{ $errors->has('ing3') ? ' is-invalid' : '' }}" name="ing3" value="{{ old('ing3') }}" required autocomplete="ing3"  min="1" max="100" >

                    @if ($errors->has('ing3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ing3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ing4" type="number" class="form-control{{ $errors->has('ing4') ? ' is-invalid' : '' }}" name="ing4" value="{{ old('ing4') }}" required autocomplete="ing4"  min="1" max="100" >

                    @if ($errors->has('ing4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ing4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="ing5" type="number" class="form-control{{ $errors->has('ing5') ? ' is-invalid' : '' }}" name="ing5" value="{{ old('ing5') }}" required autocomplete="ing5"  min="1" max="100" >

                    @if ($errors->has('ing5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ing5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Matematika </label>

                <div class="col-md-1">
                    <input id="mat1" type="number" class="form-control{{ $errors->has('mat1') ? ' is-invalid' : '' }}" name="mat1" value="{{ old('mat1') }}" required autocomplete="mat1"  min="1" max="100" >

                    @if ($errors->has('mat1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mat1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="mat2" type="number" class="form-control{{ $errors->has('mat2') ? ' is-invalid' : '' }}" name="mat2" value="{{ old('mat2') }}" required autocomplete="mat2"  min="1" max="100" >

                    @if ($errors->has('mat2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mat2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="mat3" type="number" class="form-control{{ $errors->has('mat3') ? ' is-invalid' : '' }}" name="mat3" value="{{ old('mat3') }}" required autocomplete="mat3"  min="1" max="100" >

                    @if ($errors->has('mat3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mat3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="mat4" type="number" class="form-control{{ $errors->has('mat4') ? ' is-invalid' : '' }}" name="mat4" value="{{ old('mat4') }}" required autocomplete="mat4"  min="1" max="100" >

                    @if ($errors->has('mat4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mat4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="mat5" type="number" class="form-control{{ $errors->has('mat5') ? ' is-invalid' : '' }}" name="mat5" value="{{ old('mat5') }}" required autocomplete="mat5"  min="1" max="100" >

                    @if ($errors->has('mat5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mat5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Geografi </label>

                <div class="col-md-1">
                    <input id="geo1" type="number" class="form-control{{ $errors->has('geo1') ? ' is-invalid' : '' }}" name="geo1" value="{{ old('geo1') }}" required autocomplete="geo1"  min="1" max="100" >

                    @if ($errors->has('geo1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('geo1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="geo2" type="number" class="form-control{{ $errors->has('geo2') ? ' is-invalid' : '' }}" name="geo2" value="{{ old('geo2') }}" required autocomplete="geo2"  min="1" max="100" >

                    @if ($errors->has('geo2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('geo2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="geo3" type="number" class="form-control{{ $errors->has('geo3') ? ' is-invalid' : '' }}" name="geo3" value="{{ old('geo3') }}" required autocomplete="geo3"  min="1" max="100" >

                    @if ($errors->has('geo3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('geo3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="geo4" type="number" class="form-control{{ $errors->has('geo4') ? ' is-invalid' : '' }}" name="geo4" value="{{ old('geo4') }}" required autocomplete="geo4"  min="1" max="100" >

                    @if ($errors->has('geo4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('geo4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="geo5" type="number" class="form-control{{ $errors->has('geo5') ? ' is-invalid' : '' }}" name="geo5" value="{{ old('geo5') }}" required autocomplete="geo5"  min="1" max="100" >

                    @if ($errors->has('geo5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('geo5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Ekonomi </label>

                <div class="col-md-1">
                    <input id="eko1" type="number" class="form-control{{ $errors->has('eko1') ? ' is-invalid' : '' }}" name="eko1" value="{{ old('eko1') }}" required autocomplete="eko1"  min="1" max="100" >

                    @if ($errors->has('eko1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('eko1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="eko2" type="number" class="form-control{{ $errors->has('eko2') ? ' is-invalid' : '' }}" name="eko2" value="{{ old('eko2') }}" required autocomplete="eko2"  min="1" max="100" >

                    @if ($errors->has('eko2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('eko2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="eko3" type="number" class="form-control{{ $errors->has('eko3') ? ' is-invalid' : '' }}" name="eko3" value="{{ old('eko3') }}" required autocomplete="eko3"  min="1" max="100" >

                    @if ($errors->has('eko3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('eko3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="eko4" type="number" class="form-control{{ $errors->has('eko4') ? ' is-invalid' : '' }}" name="eko4" value="{{ old('eko4') }}" required autocomplete="eko4"  min="1" max="100" >

                    @if ($errors->has('eko4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('eko4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="eko5" type="number" class="form-control{{ $errors->has('eko5') ? ' is-invalid' : '' }}" name="eko5" value="{{ old('eko5') }}" required autocomplete="eko5"  min="1" max="100" >

                    @if ($errors->has('eko5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('eko5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Sosiologi</label>

                <div class="col-md-1">
                    <input id="sos1" type="number" class="form-control{{ $errors->has('sos1') ? ' is-invalid' : '' }}" name="sos1" value="{{ old('sos1') }}" required autocomplete="sos1"  min="1" max="100" >

                    @if ($errors->has('sos1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sos1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="sos2" type="number" class="form-control{{ $errors->has('sos2') ? ' is-invalid' : '' }}" name="sos2" value="{{ old('sos2') }}" required autocomplete="sos2"  min="1" max="100" >

                    @if ($errors->has('sos2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sos2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="sos3" type="number" class="form-control{{ $errors->has('sos3') ? ' is-invalid' : '' }}" name="sos3" value="{{ old('sos3') }}" required autocomplete="sos3"  min="1" max="100" >

                    @if ($errors->has('sos3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sos3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="sos4" type="number" class="form-control{{ $errors->has('sos4') ? ' is-invalid' : '' }}" name="sos4" value="{{ old('sos4') }}" required autocomplete="sos4"  min="1" max="100" >

                    @if ($errors->has('sos4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sos4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="sos5" type="number" class="form-control{{ $errors->has('sos5') ? ' is-invalid' : '' }}" name="sos5" value="{{ old('sos5') }}" required autocomplete="sos5"  min="1" max="100" >

                    @if ($errors->has('sos5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sos5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md text-center">
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

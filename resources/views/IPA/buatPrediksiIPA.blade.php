@extends('layouts.IPA')

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
        <form method="POST" action="{{ route('membuatPrediksiIPA') }}">
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

                <label for="name" class="col-lg-4 col-form-label text-md-right">Bahasa Indonesia </label>

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
                <label for="name" class="col-md-4 col-form-label text-md-right">Fisika </label>

                <div class="col-md-1">
                    <input id="fis1" type="number" class="form-control{{ $errors->has('fis1') ? ' is-invalid' : '' }}" name="fis1" value="{{ old('fis1') }}" required autocomplete="fis1"  min="1" max="100" >

                    @if ($errors->has('fis1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fis1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="fis2" type="number" class="form-control{{ $errors->has('fis2') ? ' is-invalid' : '' }}" name="fis2" value="{{ old('fis2') }}" required autocomplete="fis2"  min="1" max="100" >

                    @if ($errors->has('fis2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fis2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="fis3" type="number" class="form-control{{ $errors->has('fis3') ? ' is-invalid' : '' }}" name="fis3" value="{{ old('fis3') }}" required autocomplete="fis3"  min="1" max="100" >

                    @if ($errors->has('fis3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fis3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="fis4" type="number" class="form-control{{ $errors->has('fis4') ? ' is-invalid' : '' }}" name="fis4" value="{{ old('fis4') }}" required autocomplete="fis4"  min="1" max="100" >

                    @if ($errors->has('fis4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fis4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="fis5" type="number" class="form-control{{ $errors->has('fis5') ? ' is-invalid' : '' }}" name="fis5" value="{{ old('fis5') }}" required autocomplete="fis5"  min="1" max="100" >

                    @if ($errors->has('fis5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fis5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Kimia </label>

                <div class="col-md-1">
                    <input id="kim1" type="number" class="form-control{{ $errors->has('kim1') ? ' is-invalid' : '' }}" name="kim1" value="{{ old('kim1') }}" required autocomplete="kim1"  min="1" max="100" >

                    @if ($errors->has('kim1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kim1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="kim2" type="number" class="form-control{{ $errors->has('kim2') ? ' is-invalid' : '' }}" name="kim2" value="{{ old('kim2') }}" required autocomplete="kim2"  min="1" max="100" >

                    @if ($errors->has('kim2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kim2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="kim3" type="number" class="form-control{{ $errors->has('kim3') ? ' is-invalid' : '' }}" name="kim3" value="{{ old('kim3') }}" required autocomplete="kim3"  min="1" max="100" >

                    @if ($errors->has('kim3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kim3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="kim4" type="number" class="form-control{{ $errors->has('kim4') ? ' is-invalid' : '' }}" name="kim4" value="{{ old('kim4') }}" required autocomplete="kim4"  min="1" max="100" >

                    @if ($errors->has('kim4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kim4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="kim5" type="number" class="form-control{{ $errors->has('kim5') ? ' is-invalid' : '' }}" name="kim5" value="{{ old('kim5') }}" required autocomplete="kim5"  min="1" max="100" >

                    @if ($errors->has('kim5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('kim5') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Biologi </label>

                <div class="col-md-1">
                    <input id="bio1" type="number" class="form-control{{ $errors->has('bio1') ? ' is-invalid' : '' }}" name="bio1" value="{{ old('bio1') }}" required autocomplete="bio1"  min="1" max="100" >

                    @if ($errors->has('bio1'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio1') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="bio2" type="number" class="form-control{{ $errors->has('bio2') ? ' is-invalid' : '' }}" name="bio2" value="{{ old('bio2') }}" required autocomplete="bio2"  min="1" max="100" >

                    @if ($errors->has('bio2'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio2') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="bio3" type="number" class="form-control{{ $errors->has('bio3') ? ' is-invalid' : '' }}" name="bio3" value="{{ old('bio3') }}" required autocomplete="bio3"  min="1" max="100" >

                    @if ($errors->has('bio3'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio3') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="bio4" type="number" class="form-control{{ $errors->has('bio4') ? ' is-invalid' : '' }}" name="bio4" value="{{ old('bio4') }}" required autocomplete="bio4"  min="1" max="100" >

                    @if ($errors->has('bio4'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio4') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-1">
                    <input id="bio5" type="number" class="form-control{{ $errors->has('bio5') ? ' is-invalid' : '' }}" name="bio5" value="{{ old('bio5') }}" required autocomplete="bio5"  min="1" max="100" >

                    @if ($errors->has('bio5'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bio5') }}</strong>
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

@extends('layouts.main')

@section('content')
<div class="container m-auto text-center w-75">
    <div class="d-sm-flex align-items-center justify-content-left mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-left">
                    <h4 class="w-50 float-left">Edit Country</h4>
                    <a href="{{route('countries.index')}}" class="btn btn-sm float-right text-primary"><i class="fas fa-home"></i> Countries</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('countries.update' , $country->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid
                                @enderror" name="name" value="{{ old('name',$country->name) }}"
                                required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('code') }}</label>

                            <div class="col-md-6">
                                <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror"
                                    name="country_code" value="{{ old('country_code',$country->country_code) }}"
                                    required autocomplete="country_code">

                                @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" mt-1 text-left">
                <form method="POST" action="{{route('countries.destroy',$country->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete {{$country->country_code}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

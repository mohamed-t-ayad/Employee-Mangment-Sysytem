@extends('layouts.main')

@section('content')
<div class="container m-auto text-center w-75">
    <div class="d-sm-flex align-items-center justify-content-left mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-left">
                    <h4 class="w-50 float-left">Edit State</h4>
                    <a href="{{route('states.index')}}" class="btn btn-sm float-right text-primary"><i class="fas fa-home"></i> States</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('states.update' , $state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('country') }}</label>
                            <div class="col-md-6">
                                <select name="country_id" class="form-control" aria-label="Default select example">
                                    @foreach ($countries as $country )
                                        <option value="{{$country->id}}" {{ $country->id == $state->country_id ? 'selected' : '' }} >
                                            {{$country->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name' ,$state->name) }}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0 text-left">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=" mt-1 text-left">
                <form method="POST" action="{{route('states.destroy',$state->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete {{$state->name}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



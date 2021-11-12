@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5 w-100">
    <h1 class="h3 mb-0 text-gray-800">Departments</h1>
</div>

<div class="container m-auto text-center py-4 m-auto justify-content-center align-items-center">
    @if(Session::has('message'))
        <div class="alert alert-warning mt-3 w-75 m-auto mb-1">{{Session::get('message')}}</div>
    @endif
    {{-- Countries Search Form  --}}
    <div class="row w-75 m-auto">
        <div class="col">
            <form method="GET" action="{{ route('departments.index')}}">
                <div class="input-group mb-1">
                    <input type="search" class="form-control mr-1 rounded" name="search" placeholder="search departments" >
                    <button type="submit" class="input-group-text btn btn-success">search</button>
                    </div>
            </form>
        </div>
    </div>
    {{-- Start Countries Table --}}
    <div class="row w-75 m-auto">
        <div class="col">
            <table class="table table-responsive-sm">
                @php
                    $i =1;
                @endphp
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody class="">
                  @foreach ($departments as $department )
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$department->name}}</td>
                        <td>
                            <a href="{{route('departments.edit',$department->id)}}" class="btn btn-sm btn-info">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <a href="{{route('departments.create')}}" class="btn btn-sm btn-primary float-left">
                    <i class="fas fa-plus"></i>
                    Add department
              </a>
        </div>
    </div>
</div>
@endsection

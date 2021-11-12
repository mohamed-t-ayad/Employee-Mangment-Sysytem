@extends('layouts.main')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5 w-100">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
</div>

<div class="container m-auto text-center  py-4">

        @if(Session::has('message'))
            <div class="alert alert-warning mt-3">{{Session::get('message')}}</div>
        @endif
        <div class="row">
            <div class="col">
                <form method="GET" action="{{ route('users.index')}}">
                    {{-- <div class="form-row ml-0 mr-0">
                        <div class="w-75">
                            <input class="form-control mb-2" type="search" name="search" placeholder="search" autocomplete="off">
                        </div>
                        <div class="w-25">
                            <button class="btn btn-success mb-2 w-100 ml-1 mr-1 " type="submit">Search</button>
                        </div>
                    </div> --}}
                    <div class="input-group mb-1">
                        <input type="search" class="form-control mr-1 rounded" name="search" placeholder="search" >
                        <button type="submit" class="input-group-text btn btn-success">search</button>
                      </div>
                </form>
            </div>
        </div>

    <div class="row">
        <div class="col">
            <table class="table table-responsive-sm">
                @php
                    $i =1;
                @endphp
                <thead class="table-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">email</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody class="table-hover">
                  @foreach ($users as $user )
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            {{-- <a href="{{route('users.destroy',$user->id)}}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> delete</a> --}}
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <a href="{{route('users.create')}}" class="btn btn-sm btn-primary float-left">
                    <i class="fas fa-plus"></i>
                    Create User
              </a>
        </div>
    </div>
</div>
@endsection

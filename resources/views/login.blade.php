@extends('layouts.layout')
@section('content')
    @if (session('status'))
        <p class="alert alert-danger mx-2 text-center">Credenciales incorrectas</p>
    @endif
    <div class="vh-100 align-items-center row d-flex justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center p-3">Login</h1>
            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label name="name" for="name" class="form-label">Nombre</label>
                    <input require name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input require name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>    
@endsection
          

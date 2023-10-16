@extends('layouts.layout')
@section('content')
        <!-- Script de confirmación-->
        <script>
            var res= function(){
                var not = confirm("Seguro?");
                return not;
            }
        </script>
        <!-- Script de confirmación-->
        <!--Nav -->
        @include('layouts.nav')
        <!--Nav -->
        <div class="container text-center d-flex flex-row m-4 ">
            <div class="">
                <h4>Usuarios</h4>
            </div>
            <div class="btn btn-info mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">+Nuevo</div>
        </div>
        @if (session('status'))
            <p class="alert alert-success mx-2 text-center">Transacción exitosa</p>
        @endif
        <div class="p-5 table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    <!-- Modal Registrar -->
                    @include('layouts.modRegistrarUser')
                    <!-- Modal Registrar -->                       
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="">ver</a>
                            <a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$item->id}}" href="#">editar</a>
                            <a class="btn btn-sm btn-danger" onclick="return res()" href="{{route("user.delete", $item->id)}}">borrar</a>
                        </td>

                        <!--Modal Modificar --> 
                        @include('layouts.modModificarUser')
                        <!--Fin Modificar --> 

                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
@endsection
        
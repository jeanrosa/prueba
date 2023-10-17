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
                <h4>Noticias</h4>
            </div>
            @if (Auth::user()->rol_id == 1 OR Auth::user()->rol_id == 2 )
            <div class="btn btn-info mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">+Nuevo</div>
            @endif
        </div>
        @if (session('status'))
            <p class="alert alert-success mx-2 text-center">Transacción exitosa</p>
        @endif
        <div class="p-5 table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Action</th>
                    <!-- Modal Registrar -->
                    @include('layouts.modRegistrarNoticias')
                    <!-- Modal Registrar -->                       
                  </tr>
                </thead>
                <tbody>
                    @foreach ($notices as $notice)
                    <tr>
                        <th scope="row">{{$notice->id}}</th>
                        <td>{{$notice->title}}</td>
                        <td>
                            <img src="{{base64_decode($notice->image)}}" alt="Miniatura" width="50">    
                        </td>
                        <td>{{$notice->created_at}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$notice->id}}" href="#">ver</a>
                            @if (Auth::user()->rol_id == 1 OR Auth::user()->rol_id == 2 )
                            <a class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal1{{$notice->id}}" href="#">editar</a>
                            <a class="btn btn-sm btn-danger" onclick="return res()" href="{{route("notice.delete", $notice->id)}}">borrar</a>
                            @endif
                        </td>
                        <!--Modal Ver --> 
                        @include('layouts.modVerNoticias')
                        <!--Fin ver --> 

                        <!--Modal Modificar --> 
                        @include('layouts.modModificarNoticias')
                        <!--Fin Modificar --> 
                        

                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
@endsection
        
<div class="modal fade" id="exampleModal1{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Noticias</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <!-- Formulario Modificar -->
                <form action="{{route('notice.update')}}" method="post">
                    @csrf
                    <div class="d-none">
                        <input name= "txtId" value="{{$notice->id}}" type="text" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input name= "txtTitle" value="{{$notice->title}}" type="text" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Autor</label>
                        <input name= "txtAuthor" value="{{$notice->author}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Contenido</label>
                        <input required name= "txtContent" value="{{$notice->content}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Imagen: <strong>{{$notice->image}}</strong></label>
                        <input required name= "txtImage" value="{{$notice->image}}" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">User: <strong>{{Auth::user()->name}}</strong></label>
                        <input required name= "txtUser" value="{{Auth::user()->id}}" type="text" class="form-control d-none" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Categoria</strong></label>
                        <select name="txtCategorie" class="form-control" id="">
                            @foreach ($categories as $categorie)
                                <option name="txtCategorie" value="{{$categorie->id}}">{{$categorie->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>                                
                <!-- Formulario Editar -->
            </div>
        </div>
    </div>
</div>
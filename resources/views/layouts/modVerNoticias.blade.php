<div class="modal fade" id="exampleModal2{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Titulo: <Strong>{{$notice->title}}</Strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
                <!--Card-->
                <div class="card" >
                    <img src="{{$notice->image}}" class="card-img-top" alt="Imagen Noticia">
                    <div class="card-body">
                        <h5 class="card-title">Autor: <strong>{{$notice->author}}</strong></h5>
                        <h5> Contenido: </h5>
                        <p class="card-text">{{$notice->content}}</p>
                        <p class="card-text"><strong>Categoría: </strong>{{$notice->description}}</p>
                        <p class="card-text">{{$notice->created_at}}</p>
                    </div>
                </div>
                <!--Card-->                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <!--<button type="submit" class="btn btn-primary">Guardar</button>-->
                </div>   
            </div>
        </div>
    </div>
</div>
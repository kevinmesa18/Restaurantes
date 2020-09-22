@extends('layouts.app')
@section('contenido')
    <div class="text-center text-white">
        <div class="row">
            <div class="col-3">
                <a class="btn btn-sm btn-secondary float-left" href="/"><i class="fas fa-home"></i></a>
            </div>
            <div class="col-6">
                <h5 class="">Restaurantes</h5>
                @if (session('status'))
                    <div class="alert alert-warning">
                        {{session('status')}}
                    </div>
                @endif     
            </div>
            <div class="col-3">
                <a class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#modalCreate">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>    
    </div>
    <br>
    <div class="row">
        @foreach($restaurantes as $restaurante)
            <div class="col-sm-4">
                <img class="card-img-top rounded-circle" width="100" height="200" src="{{$restaurante->URL_FOTO}}" alt="{{$restaurante->NOMBRE}}">
                <div class="card-body text-center">
                    <h4 class="card-title">{{$restaurante->NOMBRE}}</h4>
                    <p class="card-text">{{$restaurante->DESCRIPCION}}</p>
                    <p class="card-text">{{$restaurante->CIUDAD}}</p>
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit" onclick="enviarId({{$restaurante->ID_RESTAURANTE}})"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-sm btn-danger" href="/restaurantes/borrar?id={{$restaurante->ID_RESTAURANTE}}"><i class="fas fa-window-close"></i></a>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Modal create -->
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreate" aria-hidden="true">
        <form action="/restaurantes/guardar" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCreate">Crear restaurante</h5>
                    </div>
                    <div class="modal-body">
                            <input type="hidden" name="cantidadmesas" value="15">
                            <div class="row">                            
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input id="nombre" type="text" class="form-control" name="nombre">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input id="descripcion" type="text" class="form-control" name="descripcion">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input id="ciudad" type="text" class="form-control" name="ciudad">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="urlfoto">URL Foto</label>
                                        <input id="urlfoto" type="text" class="form-control" name="urlfoto">
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Crear restaurante</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end modal create -->
    <!-- Modal edit -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
        <form action="/restaurantes/modificar" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEdit">Editar restaurante</h5>
                    </div>
                    <div class="modal-body">
                        <input id="idRestaurante" type="hidden" name="idRestaurante">
                        <div class="row">                            
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" type="text" class="form-control" name="nombre">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input id="descripcion" type="text" class="form-control" name="descripcion">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <input id="ciudad" type="text" class="form-control" name="ciudad">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="urlfoto">URL Foto</label>
                                    <input id="urlfoto" type="text" class="form-control" name="urlfoto">
                                </div>
                            </div>                                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Modificar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End modal edit -->
@endsection
@section('scripts')
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
    function enviarId(valor){
        $('#idRestaurante').val(valor);
    }
</script>
@endsection
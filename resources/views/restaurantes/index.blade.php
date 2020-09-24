@extends('layouts.app')
@section('contenido')
    <div class="text-center text-white">
        <div class="row">
            <div class="col-3">
                <a class="btn btn-sm btn-secondary float-left" href="/" data-toggle="tooltip" title="Home">
                    <i class="fas fa-home"></i>
                </a>
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
                <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalCreate" data-toggle="tooltip" title="Crear">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        @foreach($restaurantes as $restaurante)
            <div class="col-sm-3 mt-3">
                <div class="card bg-info text-center">
                    <div class="text-center">
                        <img class="rounded-circle" width="100" height="100" src="{{$restaurante->foto}}" alt="{{$restaurante->nombre}}">
                    </div>
                    <h4 class="card-header text-white">
                        <span class="text-warning float-left" data-toggle="modal" data-target="#modalEdit" onclick="enviarId({{$restaurante->id}})"><i class="fas fa-pencil-alt"></i></span>
                        {{$restaurante->nombre}}
                        <span class="text-danger float-right" href="/restaurantes/borrar?id={{$restaurante->id}}"><i class="fas fa-eraser"></i></span>
                    </h4>
                    <div class="card-body text-center">
                        <p class="card-text text-white">
                            Categoria: {{$restaurante->categoria->nombre}} <br>
                            Ciudad: {{$restaurante->ciudad->nombre}} <br>
                            Cantidad de mesas: {{$restaurante->cantidad_mesas}} <br>
                            Mesas reservadas: {{$restaurante->reserva_count}}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Modal create -->
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreate" aria-hidden="true">
        <form action="/restaurantes/guardar" method="post">
            @csrf
            <div class="modal-dialog modal-lg text-white">
                <div class="modal-content bg-secondary">
                    <div class="modal-header">
                        <div class="modal-title" id="modalCreate">
                            <h5>Crear restaurante</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="cantidadmesas" value="15">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Ingrese el nombre" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="urlfoto">URL Foto</label>
                                    <input id="urlfoto" type="text" class="form-control" name="urlfoto" placeholder="Ingrese la url" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <select name="ciudad" id="ciudad" class="form-control">
                                        <option value="">Seleccione una ciudad</option>
                                        @foreach($ciudades as $value)
                                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <select name="categoria" id="categoria" class="form-control">
                                        <option value="">Seleccione una categoria</option>
                                        @foreach($categorias as $value)
                                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input id="descripcion" type="text" rows="5" class="form-control" name="descripcion" placeholder="Ingrese la descripcion" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fas fa-times"></i>
                            Cancelar
                        </button>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-paper-plane"></i>
                            Crear restaurante
                        </button>
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

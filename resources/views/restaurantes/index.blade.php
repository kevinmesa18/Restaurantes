@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col">
            <div class="card text-center">
                <div class="card header">
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
                            <button class="collapsed card-link btn btn-sm btn-success float-right" data-toggle="collapse" href="#collapseOne">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>                
                </div>
                <div class="card body">
                    <div id="accordion">                        
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="/restaurantes/guardar" method="post">
                                    @csrf
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
                                        <div class="col-12">
                                            <button class="btn btn-success float-right" type="submit">Agregar restaurante</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <br>
                    <table class="table table-sm table-striped table-bordered" id="">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID Restaurante</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Cantidad de mesas</th>
                                <th scope="col">Opciones</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            @foreach($restaurantes as $value)
                                <tr>
                                    <td>{{$value->ID_RESTAURANTE}}</td>
                                    <td>{{$value->NOMBRE}}</td>
                                    <td>{{$value->DESCRIPCION}}</td>
                                    <td>{{$value->CIUDAD}}</td>
                                    <td><img width="20" height="20" src="{{$value->URL_FOTO}}" alt="{{$value->NOMBRE}}"></td>
                                    <td>{{$value->CANTIDAD_MESAS}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalModificar" onclick="enviarId({{$value->ID_RESTAURANTE}})"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-sm btn-danger" href="/restaurantes/borrar?id={{$value->ID_RESTAURANTE}}"><i class="fas fa-window-close"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="modalModificar" aria-hidden="true">
            <form action="/restaurantes/modificar" method="post">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalModificar">Modificar restaurante</h5>
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
    </div>
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
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
                            <h5 class="">Reservas</h5>
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
                                <form action="/reservas/guardar" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="restaurante">Restaurante</label>
                                                <select name="idRestaurante" id="idRestaurante" class="form-control">
                                                    <option value="">Seleccione</option>
                                                    @foreach($restaurantes as $value)
                                                        <option value="{{$value->ID_RESTAURANTE}}">{{$value->NOMBRE}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="mesa">Número de Mesa</label>
                                                <input type="number" class="form-control" id="mesa" name="mesa"></input>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fecha">Fecha</label>
                                                <input type="date" class="form-control" id="fecha" name="fecha">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button onclick="submit" class="btn btn-success float-right" type="submit">Agregar reserva</button>
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
                                <th scope="col">Id Reserva</th>
                                <th scope="col">Restaurante</th>
                                <th scope="col">Número de mesa</th>
                                <th scope="col">Fecha de reserva</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Opciones</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            @foreach($reservas as $value)
                                <tr>
                                    <td>{{$value->ID_RESERVA}}</td>
                                    <td>{{$value->nombreRestaurante}}</td>
                                    <td>{{$value->MESA}}</td>
                                    <td>{{$value->FECHA_RESERVA}}</td>
                                    <td>{{$value->NOMBRE_RESERVA}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalModificar" onclick="enviarId({{$value->ID_RESERVA}})"><i class="fas fa-pencil-alt"></i></a>
                                        <a class="btn btn-sm btn-danger" href="/reservas/borrar?id={{$value->ID_RESERVA}}"><i class="fas fa-window-close"></i></a>
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
            <form action="/reservas/modificar" method="post">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalModificar">Modificar reserva</h5>
                        </div>
                        <div class="modal-body">
                            <input id="idReserva" type="hidden" name="idReserva">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="restaurante">Restaurante</label>
                                        <select name="idRestaurante" id="idRestaurante" class="form-control">
                                            <option value="">Seleccione</option>
                                            @foreach($restaurantes as $value)
                                                <option value="{{$value->ID_RESTAURANTE}}">{{$value->NOMBRE}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="mesa">Número de Mesa</label>
                                        <input type="number" class="form-control" id="mesa" name="mesa"></input>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <input type="date" class="form-control" id="fecha" name="fecha">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre">
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
        $('#idReserva').val(valor);
    }
</script>
@endsection
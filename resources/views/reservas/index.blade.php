@extends('layouts.app')
@section('contenido')
    <div class="text-center text-white">
        <div class="row">
            <div class="col-3">
                <a class="btn btn-sm btn-secondary float-left" href="/" data-toggle="tooltip" title="Home"><i class="fas fa-home"></i></a>
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
                <a class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#modalCreate" data-toggle="tooltip" title="Crear">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="container bg-white">
        <table class="table table-sm table-striped table-bordered text-center" id="">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Restaurante</th>
                    <th scope="col">Número de mesa</th>
                    <th scope="col">Fecha de reserva</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->restaurante->nombre}}</td>
                        <td>{{$value->numero_mesa}}</td>
                        <td>{{$value->fecha_reserva}}</td>
                        <td>{{$value->cliente}}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalModificar" onclick="enviarId({{$value->id}})"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-sm btn-danger" href="/reservas/borrar?id={{$value->id}}"><i class="fas fa-window-close"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal create -->
    <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreate" aria-hidden="true">
        <form action="/reservas/guardar" method="post">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCreate">Crear una reserva</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="restaurante">Restaurante</label>
                                    <select name="idRestaurante" id="idRestaurante" class="form-control">
                                        <option value="">Seleccione</option>
                                        @foreach($restaurantes as $value)
                                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mesa">Número de Mesa</label>
                                    <input type="number" class="form-control" id="mesa" name="mesa">
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
                                    <label for="nombre">Cliente</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Crear reserva</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End modal create -->
    <!-- Modal edit -->
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
                                            <option value="{{$value->id}}">{{$value->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mesa">Número de Mesa</label>
                                    <input type="number" class="form-control" id="mesa" name="mesa">
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
    <!-- End modal edit -->
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

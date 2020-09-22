@extends('layouts.app')
@section('contenido')
    <div class="text-center text-white">
        <h5 class="">APP Restaurantes</h5>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="text-center text-white">
                <img class="rounded-circle" width="300" height="300" alt="Restaurantes" src="https://cnnespanol.cnn.com/wp-content/uploads/2019/01/Galerias-nuevos-restaurantes-2019-CNN-1.jpg?quality=100&strip=info&w=320&h=240&crop=1" >
                <div class="card-body">
                    <p class="card-text">Conoce los mejores restaurantes en tu ciudad</p>
                    <a href="/restaurantes" class="btn btn-primary">Ver listado de restaurantes</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="text-center text-white">
                <img class="rounded-circle" width="300" height="300" alt="Reservas" src="https://i.pinimg.com/originals/ae/fb/df/aefbdf40cd5b178aeaa3d16830404d28.jpg">
                <div class="card-body">
                    <p class="card-text">Pide tu mesa en los mejores restaurantes de la ciudad</p>
                    <a href="/reservas" class="btn btn-primary">Pedir reservar</a>
                </div>
            </div>
        </div>
    </div>


@endsection
@extends('layouts.app')
@section('contenido')
    <div class="row">
        <div class="col">
            <div class="card text-center">
                <div class="card header">
                    <h5 class="">APP Restaurantes</h5>
                </div>
                <div class="card body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card text-center">
                                <img src="https://cnnespanol.cnn.com/wp-content/uploads/2019/01/Galerias-nuevos-restaurantes-2019-CNN-1.jpg?quality=100&strip=info&w=320&h=240&crop=1" class="card-img-top" alt="Restaurantes">
                                <div class="card-body">
                                    <h5 class="card-title">Restaurantes</h5>
                                    <p class="card-text">Conoce los mejores restaurantes</p>
                                    <a href="/restaurantes" class="btn btn-secondary">Ver</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card text-center">
                                <img src="https://i.pinimg.com/originals/ae/fb/df/aefbdf40cd5b178aeaa3d16830404d28.jpg" class="card-img-top" alt="Reservas">
                                <div class="card-body">
                                    <h5 class="card-title">Reservas</h5>
                                    <p class="card-text">Pide tu mesa en los mejores restaurantes</p>
                                    <a href="/reservas" class="btn btn-secondary">Reservar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
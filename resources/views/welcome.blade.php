@extends('layouts.app')

@section('title', 'TSM - Home')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <h1 class="display-5 fw-bold">
                Benvenuti alla pagina principale
            </h1>

            <p class="col-md-8 fs-4">Questa è la lading page per l'inventario di Thomas Marine Services. Qui potrai
                trovare tutti i dettagli relativi ai prodotti.</p>
            <a href="#documentation" class="btn btn-primary btn-lg" type="button">Documentazione</a>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>E niente, solo questo</p>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'TSM - Crea')

@section('content')
    <div class="container">

        <h1>Crea Nuovo Prodotto</h1>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="barcode" class="form-label">Codice a barre:</label>
                <input type="text" name="barcode" id="barcode" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo:</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01">
            </div>

            <div class="mb-3">
                <label for="inventory" class="form-label">Inventario:</label>
                <input type="number" name="inventory" id="inventory" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'TSM - Modifica')

@section('content')
    <div class="container">

        <h1>Modifica Prodotto</h1>

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $product->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="barcode" class="form-label">Codice a barre:</label>
                <input type="text" name="barcode" id="barcode" class="form-control"
                    value="{{ old('barcode', $product->barcode) }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo:</label>
                <input type="number" name="price" id="price" class="form-control"
                    value="{{ old('price', $product->price) }}" step="0.01" required>
            </div>

            <div class="mb-3">
                <label for="inventory" class="form-label">Inventario:</label>
                <input type="number" name="inventory" id="inventory" class="form-control"
                    value="{{ old('inventory', $product->inventory) }}">
            </div>

            <button type="submit" class="btn btn-primary">Aggiorna</button>
        </form>
    </div>
@endsection

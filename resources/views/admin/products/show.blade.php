@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="container">
        <h1>Dettagli Prodotto</h1>
        
        <div class="mb-3">
            <strong>Nome:</strong>
            <p>{{ $product->name }}</p>
        </div>
        
        <div class="mb-3">
            <strong>Codice a barre:</strong>
            <p>{{ $product->barcode }}</p>
        </div>
        
        <div class="mb-3">
            <strong>Prezzo:</strong>
            <p>{{ $product->price }}</p>
        </div>
    
        <div class="mb-3">
            <strong>Inventario:</strong>
            <p>{{ $product->inventory }}</p>
        </div>

        <!-- Edit Button -->
        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning">Modifica</a>

        <!-- Delete Button -->
        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Cancella</button>
        </form>

        <!-- Back to Product List Button -->
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Torna ai prodotti</a>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'TSM - Prodotti')

@section('content')
    <div class="container">

        <h1>Lista dei prodotti</h1>

        <!-- Search Form -->
        <form action="{{ route('admin.products.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Cerca per nome"
                        value="{{ request()->name }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="barcode" class="form-control" placeholder="Cerca per codice a barre"
                        value="{{ request()->barcode }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cerca</button>
                </div>
                <div class="col-md-2">
                    <button type="button" onclick="window.location.href='{{ route('admin.products.index') }}'"
                        class="btn btn-secondary">Cancella</button>
                </div>
            </div>
        </form>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Crea Prodotto</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Prezzo</th>
                    <th>Inventario</th>
                    <th>Codice a barre</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }} €</td>
                        <td>{{ $product->inventory }}</td>
                        <td>{{ $product->barcode }}</td>
                        <td>
                            <a href="{{ route('admin.products.show', $product) }}"
                                class="btn btn-info btn-sm">Visualizza</a>
                            <a href="{{ route('admin.products.edit', $product) }}"
                                class="btn btn-warning btn-sm">Modifica</a>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal"
                                onclick="setDeleteForm({{ $product->id }})">Cancella</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Conferma cancellazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler cancellare questo prodotto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Sì, Cancella</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-form" action="" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        // Set the form action dynamically based on the product to delete
        function setDeleteForm(productId) {
            const form = document.getElementById('delete-form');
            form.action = '/admin/products/' + productId;
        }

        // Submit the form when "Sì, Cancella" is clicked
        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            const form = document.getElementById('delete-form');
            form.submit();
        });
    </script>

@endsection

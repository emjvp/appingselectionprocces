@extends('layout')


@section('content')
    <h1>Listado de Facturas</h1>
    <br>
    <a href="/invoices/new">Crear Nueva Factura</a>
    <ul>
        @forelse ($invoices as $key => $inv)
            <li>{{ $key + 1 }}) {{ $inv->title }}, {{ $inv->finished }}</li>
        @empty
            <li>No hay Facturas Registrados</li>
        @endforelse
    </ul>
@endsection

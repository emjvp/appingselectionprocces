@extends('layout')


@section('content')
    <h1>Listado de Productos</h1>
    <ul>
        @forelse ($products as $key => $prod)
            <li>{{ $key + 1 }}) {{ $prod->name }}</li>
        @empty
            <li>No hay Productos Registrados</li>
        @endforelse
    </ul>
@endsection

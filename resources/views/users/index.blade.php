@extends('layout')


@section('content')
    <h1>Listado de Usuarios</h1>
    <ul>
        @forelse ($users as $usr)
            <li>{{ $usr->name }}, ({{ $usr->email }})</li>
        @empty
            <li>No hay Usuarios Registrados</li>
        @endforelse
    </ul>
@endsection

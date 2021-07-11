@extends('layout')


@section('content')
    <h1>Listado de Clientes</h1>
    <br>
    <a href="clients/new">Crear Nuevo Cliente</a>
    <ul>
        @forelse ($clients as $client)
            <li>{{ $client->name }}, ({{ $client->dni }}) <a href="{{ url('clients', [$client->id]) }}">ver
                    detalle</a> | <a href={{ url("clients/{$client->id}/edit") }}>editar</a> |
                <form action={{ url('clients', ['id' => $client->id]) }} method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit">eliminar</button>
                </form>
            </li>
        @empty
            <li>No hay Clientes Registrados</li>
        @endforelse
    </ul>
@endsection

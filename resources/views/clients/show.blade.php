@extends('layout')


@section('content')
    <h1>Cliente #{{ $client->id }}</h1>
    <br>
    <p>Nombre: {{ $client->name }}</p>
    <p>Dni: {{ $client->dni }}</p>
    <a href="/clients">Volver a listado de clientes</a>
    <br>
    <a href={{ url('clients/edit', [$client->id]) }}></a>
    <form action={{ url('clients', ['id' => $client->id]) }} method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit">eliminar</button>
    </form>
@endsection

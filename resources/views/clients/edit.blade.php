@extends('layout')

@section('content')

    <h1>Editar Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url("clients/{$client->id}") }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <label for="name">Nombre: </label><input type="text" name="name" value="{{ old('name', $client->name) }}">
        <br>
        <label for="name">Dni: </label><input type="number" min="1" name="dni" value="{{ old('dni', $client->dni) }}">
        <br>
        <button type="submit">Editar Cliente</button>
    </form>
    <a href="{{ route('clients.index') }}">Volver al listado de clientes</a>
@endsection

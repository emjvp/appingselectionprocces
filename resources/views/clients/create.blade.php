@extends('layout')

@section('content')

    <h1>Crear Cliente</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('clients') }}">
        {{ csrf_field() }}
        <label for="name">Nombre: </label><input type="text" name="name" value="{{ old('name') }}">
        <br>
        <label for="name">Dni: </label><input type="number" min="1" name="dni" value="{{ old('dni') }}">
        <br>
        <br>
        <button type="submit">Crear Cliente</button>
    </form>
    <a href="{{ route('clients.index') }}">Volver al listado de Clientes</a>
@endsection

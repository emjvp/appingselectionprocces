@extends('layout')


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Crear nueva Factura</h1>
    <a href="{{ route('invoices.index') }}">Volver al listado de facturas</a>
    <br>
    <h2>{{ $title }}</h2>
    <form action="{{ url('invoices/create') }}" method="GET">
        <input type="hidden" name="title" value={{ $title }}>
        <div>
            <br>
            <h4>Productos</h4>
            <ul id="product-list">
                <li>
                    <select name="product" id="product-select" value="{{ old('product') }}" onchange="fun(event)">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                    <label for="quantity">Cantidad</label>
                    <input type="number" min="1" name="quantity" id="quantity" value="{{ old('quantity') }}"
                        onchange="fun(event)">
                    <label for="price">Precio</label>
                    <input type="number" min="1" name="price" id="price" value="{{ old('price') }}" onchange="fun(event)">
                </li>
            </ul>
        </div>
        {{-- <input type="text" name="products" id='prductsInput'> --}}
        <input type="checkbox" name="finished" id="finish"><label for="finish">Factura finalizada</label>
        {{-- <input type="text" name="finish"> --}}
        <br>
        <div class="btn btn-primary" id="addProduct">Agregar producto</div>
        <button class="btn btn-primary" type="submit">Crear Factura</button>
    </form>

    <script type="text/javascript">
        const buttonAddProduct = document.getElementById('addProduct');
        const productList = document.getElementById('product-list');
        buttonAddProduct.addEventListener('click', () => {


            let newProduct = document.createElement('li');
            let newElementListHTML =
                `<select name="product" id="product-select" value{{ old('product') }}>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
                </select>
                <label for="quantity">Cantidad</label>
                <input type="number" min="1" name="quantity" id="quantity" value{{ old('quantity') }}>
                <label for="price">Precio</label>
                <input type="number" min="1" name="price" id="price" value{{ old('price') }}>
                <div onclick="delElement(event)" class="btn btn-primary">Eliminar</div>`

            newProduct.innerHTML = newElementListHTML;
            productList.appendChild(newProduct);
        });

        function delElement(event) {
            productList.removeChild(event.target.parentElement)
        }

        function fun(event) {
            const productSelect = document.getElementById('product-select');
            console.log('productSelect.text', productSelect.text);
            console.log('event.target.value', event.target.value);
        }
    </script>
@endsection

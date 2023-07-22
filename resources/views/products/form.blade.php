@extends('layout')

@section('content')
    <h2>Formulário de Produto</h2>

    <form method="POST" action="{{isset($item) ? route("products.update",$item->id) : route("products.store") }}">
        @csrf
        @if(isset($item))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="product_name">Nome do Produto *</label>
            <input
               type="text"
               class="form-control"
               id="name"
               name="name"
               required
               value="{{ isset($item) ? $item->name : '' }}"
               maxlength="200">
        </div>

        <div class="form-group">
            <label for="product_description">Descrição do Produto</label>
            <textarea
                class="form-control"
                id="description"
                name="description"
                rows="3" maxlength="3000">{{ isset($item) ? $item->description : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="product_price">Preço do Produto *</label>
            <input
                type="text"
                class="form-control"
                id="price"
                name="price"
                required
                value="{{ isset($item) ? number_format($item->price, 2) : '' }}">
        </div>

        <div class="form-group">
            <label for="stock_quantity">Quantidade em Estoque *</label>
            <input
                type="number"
                class="form-control"
                id="quantity"
                name="quantity"
                required
                value="{{ isset($item) ? $item->quantity : '' }}">
        </div>

        <button type="submit" class="btn btn-primary" title="{{ isset($item) ? 'Editar' : 'Cadastrar' }}">
            {{ isset($item) ? 'Editar' : 'Cadastrar' }}</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary" title="Voltar">Voltar</a>
    </form>
    <script>
        $(document).ready(function() {
            $('#price').maskMoney({
                prefix: 'R$ ',
                decimal: '.',
                affixesStay: false,
                allowZero: true,
                precision: 2
            });
        });
    </script>
@endsection

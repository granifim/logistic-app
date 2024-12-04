@extends('layouts.app')

@section('title', 'Создать заказ')

@section('content')
    <h1>Создать заказ</h1>

    @include('partials.errors')

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Продукт</label>
            <select class="form-select" id="product_id" name="product_id" required>
                <option value="">Выберите продукт</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ $product->stock }} на складе)
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Количество</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Отмена</a>
    </form>
@endsection

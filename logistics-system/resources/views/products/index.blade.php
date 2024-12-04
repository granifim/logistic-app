@extends('layouts.app')

@section('title', 'Список продуктов')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Продукты</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Добавить продукт</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($products->count())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Цена</th>
                <th>На складе</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
                    <td>{{ $product->price }} ₽</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Просмотр</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    @else
        <p>Нет доступных продуктов.</p>
    @endif
@endsection

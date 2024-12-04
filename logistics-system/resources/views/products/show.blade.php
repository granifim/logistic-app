@extends('layouts.app')

@section('title', 'Просмотр продукта')

@section('content')
    <h1>{{ $product->name }}</h1>

    <p><strong>Описание:</strong> {{ $product->description }}</p>
    <p><strong>Цена:</strong> {{ $product->price }} ₽</p>
    <p><strong>На складе:</strong> {{ $product->stock }}</p>

    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Редактировать</a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад к списку</a>
@endsection

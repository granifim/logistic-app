@extends('layouts.app')

@section('title', 'Просмотр заказа')

@section('content')
    <h1>Заказ #{{ $order->id }}</h1>

    <p><strong>Продукт:</strong> {{ $order->product->name }}</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>
    <p><strong>Дата создания:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Назад к списку</a>
@endsection

@extends('layouts.app')

@section('title', 'Список заказов')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Заказы</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-success">Создать заказ</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($orders->count())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Продукт</th>
                <th>Количество</th>
                <th>Статус</th>
                <th>Дата создания</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-info btn-sm">Просмотр</a>
                        @if(Auth::id() == $order->user_id)
                            <a href="{{ route('orders.edit', $order) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}
    @else
        <p>Нет доступных заказов.</p>
    @endif
@endsection

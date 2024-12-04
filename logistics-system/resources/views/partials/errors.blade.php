@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Пожалуйста, исправьте следующие ошибки:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

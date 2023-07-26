<!DOCTYPE html>
<html>
<head>
    <title>Записная книжка</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
<div class="container">
    <h1>Записи в записной книжке</h1>
    <ul>
        @foreach($entries as $entry)
            <li>
                <ul>
                    <strong>Имя:</strong> {{ $entry['full_name'] }}
                </ul>
                <ul>
                    <strong>Компания:</strong> {{ $entry['company'] ?  : 'Нет данных' }}
                </ul>
                <ul>
                    <strong>Телефон:</strong> {{ $entry['phone'] }}

                </ul>
                <ul>
                    <strong>Email:</strong> {{ $entry['email'] }}
                </ul>
                <ul>
                    <strong>Дата рождения:</strong> {{ $entry['birthdate'] ?  : 'Нет данных' }}
                </ul>
                <ul>
                    <strong>Фото:</strong> <img src="{{ $entry['photo'] ?  : 'Нет фото' }}" alt="">
                </ul>
            </li>
        @endforeach
        <li class="pagination">
            {{ $entries->links() }}
        </li>
    </ul>
</div>
</body>

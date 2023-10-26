<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
</head>
<body>
    <h1>Заявки</h1>
    <table>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Статус</th>
            <th>Адрес</th>
            <!-- Другие заголовки столбцов -->
        </tr>
    </thead>
    <tbody>
       @foreach($applications as $application)
        <tr>
            <td>{{ $application->fullname }}</td>
            <td>{{ $application->status }}</td>
            <td>{{ $application->address }}</td>
            <!-- Другие поля заявки -->
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>

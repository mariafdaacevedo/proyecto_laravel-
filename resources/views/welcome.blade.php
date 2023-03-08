<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tareas</title>
</head>
<body>
    <h1>Lista de Tareas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Estado</th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>

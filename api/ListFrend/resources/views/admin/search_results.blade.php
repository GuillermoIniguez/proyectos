@extends('layouts.panel')

@section('title', 'Panel Admin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        li:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Search Results</h1>
        <ul>
            @foreach ($results as $result)
                <li>{{ $result->name }} {{ $result->surname }}</li>
                <!-- Aquí muestra otros detalles del resultado si es necesario -->
            @endforeach
        </ul>
    </div>
</body>
</html>
@endsection 
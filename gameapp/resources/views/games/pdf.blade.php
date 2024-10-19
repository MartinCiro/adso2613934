<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Games</title>
    <style>
        table {
            border: 2px solid #372948;
            border-collapse: collapse;
        }
        table th, table td {
            font-family: sans-serif;
            font-size: 10px;
            border: 2px solid #ccc;
            padding: 4px;
        }
        table tr:nth-child(odd){
            background-color: #eee;
        }
        table th {
            background-color: #372948;
            color: #fff;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Developer</th>
            <th>Releasedate</th>
            <th>Price</th>
            <th>Genre</th>
            <th>slider</th>
            <th>Description</th>            
            <th>Category </th>
            <th>User</th>
            <th>Image</th>
        </tr>
        <thead>
        <tbody>
        @foreach ($games as $game)
        <tr>
            <td>{{ $game->title}}</td>
            <td>{{ $game->developer}}</td>
            <td>{{ $game->releasedate}}</td>
            <td>{{ $game->price}}</td>
            <td>{{ $game->genre}}</td>
            <td>{{ $game->slider}}</td>
            <td>{{ $game->description}}</td>
            <td>{{ $game->category_id}}</td>
            <td>{{ $game->user_id}}</td>
            <td><img src="{{ public_path().'/images/'.$game->image}}" width="40px"></td>
        </tr>            
        @endforeach
    </tbody>
    </table>
</body>
</html>
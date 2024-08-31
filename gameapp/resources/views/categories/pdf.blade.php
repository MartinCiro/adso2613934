<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
</head>
<style>
    
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Photo</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->$id }}</td>
            <td>{{ $user->$fullname }}</td>
            <td>{{ $user->$email }}</td>
            <td>{{ $user->$phone }}</td>
            <td>{{ $user->$role }}</td>
            <td><img src="{{ public_path().'/images/'. $user->photo }}" alt="" width="40px"></td>
        </tr>
        @endforeach
    </table>
</body>

</html>

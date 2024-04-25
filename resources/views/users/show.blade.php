<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/developer.css') }}">
    
</head>

<body>
<div class="container">
    <h1>User Details</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td><strong>Image:</strong></td>
                    <td><img src="{{ asset('images/users/image/' . $user->id . '/' . $user->image) }}" class="imageFile"></td>
                </tr>
                <tr>
                    <td><strong>Active:</strong></td>
                    <td>{{ $user->active ? 'Yes' : 'No' }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>

</html>
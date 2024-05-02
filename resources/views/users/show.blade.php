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
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-left">
                    <a href="{{ route('users.index') }}">
                        <button type="button" class="btn btn-primary">Back</button>
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('users.create') }}">
                        <button type="button" class="btn btn-primary">New user? Create your account</button>
                    </a>
                </div>
            </div>
        </div>

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
                        <td><img src="{{ asset('images/users/images/' . $user->id . '/' . $user->image) }}"
                                class="imageFile"></td>
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

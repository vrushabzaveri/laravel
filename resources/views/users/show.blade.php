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
                <p class="card-text"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="card-text"><strong>Image:</strong> <img src="{{ asset('images/users/image/' . $user->id . '/' . $user->image) }}" class="imageFile" ></p>
                <p class="card-text"><strong>Active:</strong> {{ $user->active ? 'Yes' : 'No' }}</p>
            </div>
        </div>
    </div>
</body>

</html>
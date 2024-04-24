<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value="{{ $user->username }}" required class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password"  class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Existing Image:</label><br>
                <img src="{{ asset('images/original/' . $user->id . '/' . $user->image) }}" alt="User Image" width="150">
            </div>

            <div class="form-group">
                <label for="active">Active:</label>
                <select name="active" required class="form-control">
                    <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <title>Create User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/developer.css') }}">

</head>

<body>
    <div class="container">
        <h1 class="mb-6">Create User</h1>
        <div class="row">
            <div class="col-md-6 text-left">
                <a href="{{ route('users.index') }}">
                    <button type="button" class="btn btn-primary">Back</button>
                </a>

                <a href="{{ route('login') }}">
                    <button type="button" class="btn btn-primary">Already a User? Login ></button>
                </a>
            </div>
        </div>
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" required class="form-control">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" required class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" required class="form-control-file">
            </div>

            <div class="form-group">
                <label for="active">Active:</label>
                <select name="active" required class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>

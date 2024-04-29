<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/developer.css') }}">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" autofocus required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <div class="login-btn">
                <div class="button-group">
                    <button type="submit" class="custom-button">Login</button>
                </div>
                <div class="button-group">
                    <a href="{{ route('register') }}">
                        <button type="button" class="btn btn-primary">Create New User</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
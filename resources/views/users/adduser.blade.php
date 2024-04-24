<!DOCTYPE html>
<html>
<head>
    <title>Create User Form</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group col-md-6">
            <label for="name">Name:</label>
            <input type="text" name="name" required class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" name="image" required>
        </div>

        <div class="form-group">
            <label for="active">Active:</label>
            <select name="active" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>

</html>

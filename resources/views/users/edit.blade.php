<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/developer.css') }}">
</head>

<body>
    <div class="container">
        <h1>Edit User</h1>
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
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" value="{{ $user->password }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="active">Active:</label>
                        <select name="active" class="form-control" required>
                            <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Existing Image:</label><br>
                        {{-- existing image photo  --}}
                        <img src="{{ asset('images/users/images' . '/' . $user->id . '/' . $user->image) }}"
                            class="imageFile"><br>

                        <label for="newImage">Choose Another Image:</label>
                        <input type="file" id="newImage" name="image" accept="image/*"
                            onchange="displayNewImage(event)">

                        <img src="#" id="newImagePreview" class="imageFile" style="display: none;">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <script>
        function displayNewImage(event) {
            var newImage = document.getElementById('newImagePreview');
            newImage.src = URL.createObjectURL(event.target.files[0]);
            newImage.style.display = 'block';
            var existingImage = document.getElementById('existingImage');
            existingImage.style.display = 'none';
        }
    </script>
</body>

</html>

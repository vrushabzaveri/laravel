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
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">

            @method('PUT')
            @csrf
            

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="{{ $user->name }}"  class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ $user->email }}"  class="form-control" required>
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value="{{ $user->username }}"  class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" value="{{ $user->password }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="image">Existing Image:</label><br>
                <img src="{{ asset('images/users/image/' . $user->id . '/' . $user->image) }}" id="existingImage" class="imageFile"><br>
                <!--  to add another image -->
                <label for="newImage">Choose Another Image:</label>
                <input type="file" id="newImage" name="image" accept="image/*" onchange="displayNewImage(event)">
                <img src="#" id="newImagePreview" class="imageFile" style="display: none;">
            </div>


            <div class="form-group">
                <label for="active">Active:</label>
                <select name="active"  class="form-control " required>
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

<script>
    function displayNewImage(event) {
    var newImage = document.getElementById('newImagePreview');
    newImage.src = URL.createObjectURL(event.target.files[0]);
    newImage.style.display = 'block';
    var existingImage = document.getElementById('existingImage');
    existingImage.style.display = 'none';
}
</script>
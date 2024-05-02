<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="{{ asset('css/developer.css') }}">
    <title>User List</title>
</head>

<body>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>

    <div class="container">
        <h1>User Listing</h1>
        <div class="btn-container">

            <a href="{{ route('users.create') }}">
                <button type="button" class="custom-button">Add User</button>
            </a>
            {{-- javascript has been used for user logout --}}
            <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="custom-button">Log Out</button>
            </a>


        </div>

        <table class="table-hover">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td><img src="{{ asset('images/users/images/' . $user->id . '/' . $user->image) }}" alt="User Image" class="imageFile"></td>
                    <td>{{ $user['active'] ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">View</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

</body>

</html>

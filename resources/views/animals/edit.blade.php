<!-- resources/views/animals/edit.blade.php -->

<form action="{{ route('animals.update', $animal) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="species">Species:</label>
    <input type="text" name="species" value="{{ $animal->species }}" required>

    <label for="gender">Gender:</label>
    <input type="text" name="gender" value="{{ $animal->gender }}" required>

    <label for="profile_image">Profile Image:</label>
    <input type="file" name="profile_image">

    <button type="submit">Update</button>
</form>

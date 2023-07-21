<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
</head>
<body>
<h1>
Welcome To note app
</h1>
    <a href="{{ route('notes.create') }}">Create a new note</a>
    @foreach ($notes as $note)
        <p>{{ $note->note }}</p>
        <a href="{{ route('notes.show', $note->id) }}">Show</a>
        <a href="{{ route('notes.edit', $note->id) }}">Edit</a>
        <form action="{{ route('notes.destroy', $note->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endforeach
</body>
</html>

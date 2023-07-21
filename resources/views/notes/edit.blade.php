@extends('layouts.app')

@section('content')
    <h1>Edit Note</h1>
    <form action="{{ route('notes.update', $note) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="note">Note:</label>
            <input type="text" class="form-control" id="note" name="note" value="{{ $note->note }}">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
@endsection

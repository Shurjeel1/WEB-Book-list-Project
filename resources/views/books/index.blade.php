@extends('books.layout')
@section('content')
<div class="wrapperdiv">
@if($message = Session::get('success'))
<div class="alert alert-success text-center">{{ $message }}</div>
@endif
<h2 style="font-family: algerian">Book List Management</h2>
<p></p>
<p></p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Type</th>
            <th scope="col"></th>
        </tr>
    </thead>
    @isset($books)
    <tbody>
        @foreach($books as $book)
        <tr>
            <td class="align-middle"><img src="{{ asset('uploads/'.$book->Coverpage ) }}" class="img-thumbnail" /></td>
            <td class="align-middle">{{ $book->title }}</td>
            <td class="align-middle">{{ $book->author }}</td>
            <td class="align-middle">{{ $book->type }}</td>
            <td class="align-middle">
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    @endisset
</table>
<div class="d-flex">
    <div class="mx-auto">
        {!! $books->links() !!}
    </div>
</div>
</div>
@endsection

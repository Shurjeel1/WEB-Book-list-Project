@extends('books.layout')
@section('content')
<div class="wrapperdiv">
    @if($books)
        @foreach($books as $book)
            <div class="row pb-5">
                <div class="col-4"></div>
                <div class="col-4">
                    <div class="card" style="width: 20rem;">
                        <img src="{{ asset('uploads/'.$book->Coverpage ) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->author }} | {{ $book->type }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4"></div>
            </div>
        @endforeach
    @endif
</div>
@endsection

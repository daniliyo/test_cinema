<html>
    <head>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="container">
            <div class="row">
                @if (Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <h1>{{ $movie->title }}</h1>
            <p>{{ $movie->description }}</p>
            <p>Release date: {{ $movie->release_date }}</p>
            <p>Genres:</p>
            @foreach($movie->genres as $genre)
                <ol>{{ $genre->name }}</ol>
            @endforeach
            <div class="row">
                <div class="col-3">
                    <span><a href="{{ route('movies.index') }}" class="btn btn-primary">Home</a></span>
                </div>
                <div class="col-3">
                    <span><a href="{{ route('movies.edit', $movie) }}" class="btn btn-primary">Edit</a></span>
                </div>
                <div class="col-3">
                    <form method="POST" action="{{ route('movies.destroy', $movie) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
            </div>            
        </div>
    </body>
</html>
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
            <h1>{{ $genre->name }}</h1>
            
            <div>
                <span><a href="{{ route('genres.index') }}" class="btn btn-primary">Home</a></span>
                <span><a href="{{ route('genres.edit', $genre) }}" class="btn btn-primary">Edit</a></span>
                <form method="POST" action="{{ route('genres.destroy', $genre) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>            
        </div>
    </body>
</html>
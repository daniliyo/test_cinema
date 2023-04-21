<html>
    <head>
        @vite(['resources/js/app.js'])
    </head>
    <body>
    <div class="container">
            <h1>Adding a new genre</h1>
            <div class="row">
                <a href="{{ route('genres.index') }}" class="button">Home</a>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('genres.store') }}">
                    @csrf
                    <hr>
                    <div class="mb-3">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" id="name" aria-describedby="emailHelp" value="{{ old('name') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </body>
</html>
<html>
    <head>
        @vite(['resources/js/app.js'])
    </head>
    <body>
    <div class="container">
            <h1>Editing a {{ $movie->title }} movie</h1>
            <div class="row">
                <a href="{{ route('movies.index') }}" class="button">Home</a>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('movies.update', $movie) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $movie->id }}">
                    <hr>
                    <div class="mb-3">
                        @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                            name="title" id="title" value="{{ $movie->title }}">
                    </div>
                    <hr>
                    <div class="mb-3">
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control  @error('description') is-invalid @enderror" id="description" 
                            name="description" rows="3">{{ $movie->description }}</textarea>
                    </div>
                    <hr>
                    <div class="mb-3">
                        @error('release_date')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="release_date" class="form-label">Release date</label>
                        <input type="text" class="form-control @error('release_date') is-invalid @enderror" 
                            name="release_date" id="release_date" value="{{ $movie->release_date }}">
                    </div>
                    <hr>
                    <div class="mb-3">
                        @error('genre')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label for="category" class="form-label">Genre</label>
                        <select multiple class="form-select @error('genre') is-invalid @enderror" 
                            name="genre[]" id="genre">
                            
                            @foreach ($genries as $genre)
                                <option value="{{ $genre->id }}"
                                    @if($genresOfMovie && in_array($genre->id, $genresOfMovie)) selected @endif>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </body>
</html>
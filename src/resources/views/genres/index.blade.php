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
            <div class="row">
                <span><a class="btn btn-primary" href="{{ route('genres.create') }}">Add</a></span>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($genres as $genre)
                        <tr>
                        <td scope="row">1</td>
                        <td><a href="{{ route('genres.show', $genre) }}">{{ $genre->name }}</a></td>
                        <td>
                            <a href="{{ route('genres.edit', $genre) }}" class="mb-2 btn btn-info">Edit</a>
                            
                            <form method="POST" action="{{ route('genres.destroy', $genre) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                {!! $genres->links() !!}
            </div>
        </div>
    </body>
</html>
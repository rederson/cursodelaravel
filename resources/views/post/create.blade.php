<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Curso de Laravel</title>
</head>

<body>
    <main class="container">

        <h1>ADICIONAR POST</h1>
        <form method="post" action="{{ route('posts.store') }}">
            @csrf
            <div class="form-grpup mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="title" name="title" class="form-control @error('title') is-invalid @enderror"
                    id="title" aria-describedby="title" value="{{ old('title') }}">
                <div id="title" class="form-text">Este é o campo title.</div>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-grpup mb-3">
                <label for="content" class="form-label">Conteúdo</label>
                <textarea type="content" name="content" class="form-control @error('content') is-invalid @enderror"
                    id="content" aria-describedby="content" value="{{ old('content') }}">
                </textarea>
                <div id="content" class="form-text">Este é o campo conteúdo.</div>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-success" >CADASTRAR POST</button>
            </div>

        </form>


    </main>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>

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

        <div class="d-flex justify-content-between p-2">
            <h1>INDEX</h1>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-link">SAIR</button>
            </form>

        </div>

        <div class="d-flex justify-content-between">
            <a type="button" href="{{ route('users.create') }}" class="btn btn-primary"> NOVO USUÁRIO </a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Data de Criação</th>
                    <th scope="col">Ver</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Posts</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address->street }}</td>
                        <td>{{ $user->address->number }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td> <a type="button" href="{{ route('users.show', $user->id) }}"
                                class="btn btn-success">VER</a>
                        <td> <a type="button" href="{{ route('users.edit', $user->id) }}"
                                class="btn btn-warning">EDITAR</a>
                        <td> <a type="button" href="{{ route('users.address', $user->id) }}"
                                class="btn btn-info">Endereço</a>
                        <td> <a type="button" href="{{ route('users.posts', $user->id) }}"
                                class="btn btn-dark">Posts</a>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">DELETAR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

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

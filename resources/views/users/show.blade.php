@include('plantillas.navinicio')
    <br>
    <br>
    <br>
    <link rel="stylesheet" href="{{ asset('css/privada_admin.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


    <div class="container">
        <h1>Detalles del Usuario</h1>

        <a href="{{ route('privada_admin') }}" class="btn btn-primary mb-2 float-right mt-2">Regresar</a>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Nombre:</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Cargo:</th>
                    <td>{{ $user->cargo->nombre }}</td>
                </tr>
            </tbody>
        </table>
    </div>

   
    @include('plantillas.fooster')
    @include('plantillas.Animacion')


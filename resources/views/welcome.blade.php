<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Include any additional stylesheets or scripts here -->
</head>

<body>
    @extends('layouts.master')
    @section('header')
        @parent()
    @endsection

    @section('content')

        <h1 class="mt-4">Lista de Peliculas</h1>
        <ul>
            <li><a href=/filmout/oldFilms>Pelis antiguas</a></li>
            <li><a href=/filmout/newFilms>Pelis nuevas</a></li>
            <li><a href=/filmout/films>Pelis</a></li>
            <li><a href=/filmout/filmsByYear>Pelis ordenadas por año</a></li>
            <li><a href=/filmout/filmsByGenre>Pelis agrupadas por genero</a></li>
            <li><a href=/filmout/sortFilms>Pelis ordenadas por año(descendiente)</a></li>
            <li><a href=/filmout/countFilms>Numero de peliculas</a></li>

        </ul>
        <h1 class="mt-4">Lista de Actores</h1>
        <ul>
            <li><a href="/actorout/countActors">Numero de actores</a></li>
            <li><a href="/actorout/listActors">Lista de Actores</a></li>
            <li><form action="/actorout/listActorsByDecade" method="get">
                    Decada nacimiento <select name="year">
                    <option value="1980">1980-1989</option>
                    <option value="1990">1990-1999</option>
                    <option value="2000">2000-2009</option>
                    <option value="2010">2010-2019</option>
                </select>
                <input type="submit" value="enviar">
            </form></li>
            <li></li>
        </ul>

        <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <!-- Include any additional HTML or Blade directives here -->

        <h2>Añadir Pelicula</h2>
        @if (!@empty($status))
            <p style="color:red;">{{$status}}</p>
        @endif
        <form action="{{route('createFilm')}}" method="POST">
            {{ csrf_field() }}
            <label>
                Nombre: <input type="text" name="name">
            </label>
            <br>
            <label>
                Año: <input type="number" name="year">
            </label>
            <br>
            <label>
                Genero: <input type="text" name="genre">
            </label>
            <br>
            <label>
                Pais: <input type="text" name="country">
            </label>
            <br>
            <label>
                Duracion: <input type="text" name="duration">
            </label>
            <br>
            <label>
                Imagen URL: <input type="text" name="img_url">
            </label>
            <br>
            <input type="submit" value="Enviar" name="send">
        </form>
    @endsection
    @section('footer')
        @parent
    @endsection
</body>

</html>
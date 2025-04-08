<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Film;



class FilmController extends Controller
{
    
    /**
     * Read films from storage
     */

    public static function readFilms(): array
    {
        // Read films from JSON storage
        $films = Storage::json('/public/films.json');
        $dbFilms = Film::all();
        $convertedFilms = $dbFilms->toArray();

        $finalArray = array_merge($films, $convertedFilms);

        return $finalArray;
    }
    /**
     * List films older than input year 
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listOldFilms($year = null)
    {
        $old_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Antiguas (Antes de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            //foreach ($this->datasource as $film) {
            if ($film['year'] < $year)
                $old_films[] = $film;
        }
        return view('films.list', ["films" => $old_films, "title" => $title]);
    }
    /**
     * List films younger than input year
     * if year is not infomed 2000 year will be used as criteria
     */
    public function listNewFilms($year = null)
    {
        $new_films = [];
        if (is_null($year))
            $year = 2000;

        $title = "Listado de Pelis Nuevas (Después de $year)";
        $films = FilmController::readFilms();

        foreach ($films as $film) {
            if ($film['year'] >= $year)
                $new_films[] = $film;
        }
        return view('films.list', ["films" => $new_films, "title" => $title]);
    }
    /**
     * Lista TODAS las películas o filtra x año o categoría.
     */
    public function listFilms($year = null, $genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year) && is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year) && is_null($genre)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            } else if ((is_null($year) && !is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            } else if (!is_null($year) && !is_null($genre) && strtolower($film['genre']) == strtolower($genre) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x categoria y año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function listFilmsByYear($year = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();

        //if year and genre are null
        if (is_null($year))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($year)) && $film['year'] == $year) {
                $title = "Listado de todas las pelis filtrado x año";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function listFilmsByGenre($genre = null)
    {
        $films_filtered = [];

        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();
        //if year and genre are null
        if (is_null($genre))
            return view('films.list', ["films" => $films, "title" => $title]);

        //list based on year or genre informed
        foreach ($films as $film) {
            if ((!is_null($genre)) && strtolower($film['genre']) == strtolower($genre)) {
                $title = "Listado de todas las pelis filtrado x categoria";
                $films_filtered[] = $film;
            }
        }
        return view("films.list", ["films" => $films_filtered, "title" => $title]);
    }

    public function sortedByYear()
    {
        $title = "Listado de todas las pelis";
        $films = FilmController::readFilms();
        usort($films, fn($a, $b) => $b['year'] - $a['year']);

        return view("films.list", ["films" => $films, "title" => $title]);
    }

    public function countFilms()
    {
        //Aqui lo que hago es recoger el array que devuelve ReadFilms y contar el número de elementos
        $films = FilmController::readFilms();
        $count = count($films);
        $title = "El numero de peliculas es: ";

        return view("films.count", ["count" => $count, "title" => $title]);
    }

    public function createFilm(Request $request)
    {
        $newFilm = $request->only(['name', 'year', 'genre', 'country', 'duration', 'img_url']);
        $storageFlag = env('FLAG', 'JSON');

        if ($storageFlag === 'JSON') {
            $films = FilmController::readFilms();
            if (!FilmController::isFilm($newFilm['name'])) {
                $films[] = $newFilm;
                if (!Storage::put('/public/films.json', json_encode($films))) {
                    return view("welcome", ["status" => "Error al añadir pelicula"]);
                }
            } else {
                return view("welcome", ["status" => "Error, pelicula ya existe"]);
            }
        } elseif ($storageFlag === 'DB') {
            if (!FilmController::isFilm($newFilm['name'])) {
                Film::create($newFilm);
            }
        }

        return redirect()->action('App\Http\Controllers\FilmController@listFilms');
    }

    public static function isFilm($filmname)
    {
        $films = FilmController::readFilms();
        foreach ($films as $film) {
            if ($film['name'] == $filmname) {
                return true;
            }
        }
        return false;
    }

    public static function listFilmsWithActors()
{
    $filmsWithActors = Film::with('actors')->get();
    // Retornar los datos como JSON
    return response()->json($filmsWithActors);
}
}

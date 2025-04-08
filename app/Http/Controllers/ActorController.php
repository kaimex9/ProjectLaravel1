<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{
    public function readActors()
    {
        $actors = Actor::all();
        return $actors;
    }

    public function countActors()
    {
        $count = Actor::count();
        $title = "El numero de actores es: ";
        return view("actors.count", ["count" => $count, "title" => $title]);
    }

    public function listActors()
    {
        $title = "Listado de Actores";
        $actors = json_decode(ActorController::readActors(), true);
        return view("actors.list", ["actors" => $actors, "title" => $title]);
    }


    public function listActorsByDecade(Request $request)
    {
        $year = $request->query('year');

        // Definir el rango de fechas correctas
        $startDate = $year . '-01-01';
        $endDate = ($year + 9) . '-12-31';

        $actors = Actor::whereBetween('birthdate', [$startDate, $endDate])
            ->get()
            ->toArray();
        $title = "Listado de Actores de la década de los " . $year . "s";

        return view("actors.list", ["actors" => $actors, "title" => $title]);
    }

    public function destroyActor($id)
    {
        $actor = Actor::find($id);

        if ($actor) {
            $actor->delete();
            return response()->json(['result' => true]);
        }

        return response()->json(['result' => false]);
    }

    public function listActorsWithMovies()
    {
        $actorsWithFilms = Actor::with('films')->get();
        return response()->json($actorsWithFilms);
    }
}
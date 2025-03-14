<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class ActorController extends Controller
{
    public function readActors()
    {
        $actors = DB::table('actors')->get();
        return $actors;
    }

    public function countActors()
    {
        $actors = DB::table('actors')->get();
        $count = count($actors);
        $title = "El numero de actores es: ";
        return view("actors.count", ["count" => $count, "title" => $title]);
    }

    public function listActors()
    {
        $title = "Listado de Actores";
        $actors = json_decode(ActorController::readActors(), true);
        return view("actors.list", ["actors" => $actors, "title" => $title]);
    }
}
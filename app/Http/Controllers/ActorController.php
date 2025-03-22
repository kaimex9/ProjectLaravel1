<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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

    public function listActorsByDecade(Request $request)
    {
        $year = $request->query('year');
    
        // Definir el rango de fechas correctas
        $startDate = $year . '-01-01';
        $endDate = ($year + 9) . '-12-31';
    
        $actors = DB::table('actors')
            ->whereBetween('birthdate', [$startDate, $endDate])
            ->get()
            ->map(function ($actor) {
                return (array) $actor; // Convertimos cada objeto en un array
            })
            ->toArray();
        $title = "Listado de Actores de la década de los " . $year . "s";
    
        return view("actors.list", ["actors" => $actors, "title" => $title]);
    }

    public function destroyActor($id)
    {
        //Aqui a traves de postman se introducira el id del actor a eliminar
        DB::table('actors')->where('id', $id)->delete();
        return redirect()->route('listActors');
    }
}
<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class ValidateUrl
{
    public function valURL(Request $request, Closure $next)
    {
        $url = $request->route('url');

        if (isset($url)) {
            //Queda por validar
            //Si el la url no es valida: return view("example");
            return $next($request);
        }
    }
}
?>
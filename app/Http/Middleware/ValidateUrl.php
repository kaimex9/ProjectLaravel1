<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class ValidateUrl{
    public function valURL(Request $request, Closure $next){
        $url = $request->route('url');

        if (isset($url)) {
            if ($url != "127.0.0.1") {
                # code...
            }
        }
    }
}
?>
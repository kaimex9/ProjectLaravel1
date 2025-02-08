<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class ValidateUrl
{
    public function handle(Request $request, Closure $next)
    {
        $url = $request->input('img_url');

        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return $next($request);
        } else {
            return response(view("welcome", ["status" => "Error, la url imagen no es correcta"]));
        }
    }
}
?>
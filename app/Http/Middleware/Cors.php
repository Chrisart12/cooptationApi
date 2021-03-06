<?php

// namespace App\Http\Middleware;

// use Closure;

// class Cors
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle($request, Closure $next)
//     {
//         return $next($request)->header('Access-Control-Allow-Origin', '*')
//                               ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

//     }
// }

namespace App\Http\Middleware;
use Closure;
class Cors
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        // $response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, DELETE');
        // $response->header('Access-Control-Allow-Headers', $request->header('Access-Control-Request-Headers'));
        // header_remove('Access-Control-Allow-Origin');
        // header_remove('Access-Control-Allow-Methods');
        // header_remove('Access-Control-Allow-Headers');
        $response->header('Access-Control-Allow-Methods', '*');
        $response->header('Access-Control-Allow-Headers', '*');
        $response->header('Access-Control-Allow-Origin', '*');

        // header('Access-Control-Allow-Origin: *');
        // header('Access-Control-Allow-Methods: *');
        // header('Access-Control-Allow-Headers: *');

        return $response;

    }
}

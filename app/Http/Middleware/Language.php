<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Language
{

    public function handle(Request $request, Closure $next)

    {
        if(session()->has('applocale') AND array_key_exists(session()->get('applocale'),config('languages'))){
            App::setlocale(session()->get('applocale'));
        }else{
            App::setlocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}

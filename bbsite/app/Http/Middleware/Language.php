<?php

namespace App\Http\Middleware;
use App;
use Config;
use Session;

use Closure;

class Language
{
    public function handle($request, Closure $next)
    {
        if(Session::has('locale')) {
            $locale = Session::get('locale', Config::get('app.locale'));
        } else {
            $locale = 'vi';
        }

        App::setLocale($locale);
        return $next($request);
    }
}

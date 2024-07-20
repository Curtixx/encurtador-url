<?php

namespace App\Pipes;

use App\Service\EncurtadorService;
use Closure;

class GenerateHasUrl
{
    public function handle($url, Closure $next)
    {
        $encurtador = new EncurtadorService($url);
        $encurtador->generateHasURL();

        return $next($encurtador->generateShortURL());
    }
}

<?php

namespace App\Middleware;

use Cake\Http\Cookie\Cookie;
use Cake\I18n\FrozenTime;

class AdPETCookieMiddleware
{
    public function __invoke($request, $response, $next)
    {
        $cookieName = 'adpet';
        $cookie = $request->getCookie($cookieName);

        if(!$cookie){
            $expiry = new FrozenTime('+ 1 year');
            $response = $response->withCookie(
                new Cookie(
                    $cookieName,
                    $request->getRequestTarget(),
                    $expiry
                ));
        }

        return $next($request, $response);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use JWTAuth;

class PassengeriIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        try {
          \Config::set('auth.providers.users.model', \App\Models\Passenger::class);
          \Config::set('jwt.user', \App\Models\Passenger::class);
          \Config::set('auth.model', \App\Models\Passenger::class);
          if (! $passenger = JWTAuth::parseToken()->authenticate()) {
              return response()->json(['user_not_found'], 404);
          }
         } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
         } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
           return response()->json(['token_invalid'], $e->getStatusCode());
         } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
           return response()->json(['token_absent'], $e->getStatusCode());
         }
         return $next($request);
    }

}

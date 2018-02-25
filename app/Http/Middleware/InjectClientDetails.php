<?php 

namespace App\Http\Middleware;

use Closure;

class InjectClientDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Adding the client_id and client_secret
        $request->request->add([
            'client_id' => config('auth.passport.client.id'),
            'client_secret' => config('auth.passport.client.secret'),
        ]);

        return $next($request);
    }
}

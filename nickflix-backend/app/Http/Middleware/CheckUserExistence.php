<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class CheckUserExistence
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
        $email = $request->only('email');

        if (User::where('email', $email)->exists() == false) {
            return response()->json(["error" => "This user does not exists"], 403);
        }

        return $next($request);
    }
}

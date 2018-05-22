<?php

namespace App\Http\Middleware;

use App\Models\User\Bag;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserBag
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user->player->bag) {
            Bag::create([
                'player_id' => $user->player->id,
            ]);
        }

        return $next($request);
    }
}

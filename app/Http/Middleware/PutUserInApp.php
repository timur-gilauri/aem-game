<?php

namespace App\Http\Middleware;

use App\Classes\CurrentUser;
use App\Repositories\User\PlayerRepository;
use Closure;
use Illuminate\Support\Facades\Auth;

class PutUserInApp
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
        /** @var PlayerRepository $repo */
        $repo = app(PlayerRepository::class);

        $user = Auth::user();
        $player = $repo->findByUserId($user->id);

        $currentUser = new CurrentUser();
        $currentUser->setUser($user);
        $currentUser->setPlayer($player);

        app()->instance(CurrentUser::class, $currentUser);

        return $next($request);
    }
}

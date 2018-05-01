<?php

namespace App\Http\Controllers;

use App\Entities\Locations\LocationEntity;
use App\Entities\User\PlayerEntity;
use App\Repositories\Locations\LocationRepository;
use App\Repositories\Stuff\ElixirRepository;
use App\Repositories\User\PlayerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /** @var LocationRepository */
    protected $repo;
    /** @var ElixirRepository */
    protected $elixirRepo;
    /** @var PlayerRepository */
    protected $playerRepo;

    public function __construct()
    {
        $this->middleware('auth');

        $this->repo = app(LocationRepository::class);
        $this->elixirRepo = app(ElixirRepository::class);
        $this->playerRepo = app(PlayerRepository::class);
    }

    public function goToLocation(Request $request)
    {
        $user = Auth::user();
        $player = $this->playerRepo->findByUserId($user->id);

        $slug = $request->route('slug');

        /** @var LocationEntity $location */
        $location = $this->repo->findBySlug($slug);

        if (!$location || !view()->exists('locations.' . $slug)) {
            return redirect(route('home'), 301);
        }

        return $this->{$slug}($request, $player, $location);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function healer(Request $request, PlayerEntity $player, LocationEntity $location)
    {
        $title = $location->getTitle();
        $elixirs = $this->elixirRepo->all();

        return view('locations.' . $location->getSlug(), [
            'title'   => $title,
            'player'  => $player,
            'elixirs' => $elixirs,
        ]);
    }

    public function square(Request $request, PlayerEntity $player, LocationEntity $location)
    {
        $title = $location->getTitle();
        $locations = $location->getChildren();

        return view(('locations.' . $location->getSlug()), [
            'title'     => $title,
            'player'    => $player,
            'locations' => $locations
        ]);
    }


}

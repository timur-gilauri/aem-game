<?php

namespace App\Http\Controllers;

use App\Classes\CurrentUser;
use App\Entities\Locations\LocationEntity;
use App\Entities\User\PlayerEntity;
use App\Models\Locations\Location;
use App\Repositories\Locations\LocationRepository;
use App\Repositories\Stuff\ArmorRepository;
use App\Repositories\Stuff\ElixirRepository;
use App\Repositories\Stuff\WeaponRepository;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /** @var LocationRepository */
    protected $repo;
    /** @var array */
    protected $repos;
    /** @var ElixirRepository */
    protected $elixirRepo;

    public function __construct()
    {
        parent::__construct();

        $this->middleware('auth');
        $this->middleware('user');

        $this->repo = app(LocationRepository::class);

        $this->repos = [
            'healer'  => [
                'repo'      => app(ElixirRepository::class),
                'itemsType' => 'elixir'
            ],
            'armorer' => [
                'repo'      => app(WeaponRepository::class),
                'itemsType' => 'weapon'
            ],
            'smith'   => [
                'repo'      => app(ArmorRepository::class),
                'itemsType' => 'armor'
            ],
        ];
    }

    public function goToLocation(Request $request)
    {
        /** @var CurrentUser $user */
        $user = app(CurrentUser::class);

        $player = $user->getPlayer();

        $cityId = $user->getPlayer()->getCityId();

        /** @var LocationEntity $location */
        $location = $this->repo->findBySlugAndCityId($request->route('location'), $cityId);

        $title = $location->getTitle();

        if ($location->getType() == Location::TYPES['market']) {
            $items = $this->repos[$request->route('location')]['repo']->all();
            $itemsType = $this->repos[$request->route('location')]['itemsType'];
            $viewName = 'locations.market';
        } else {
            $items = $location->getChildren();
            $viewName = 'locations.' . $location->getSlug();
            $itemsType = 'location';
        }

        return view($viewName, [
            'title'     => $title,
            'player'    => $player,
            'items'     => $items,
            'itemsType' => $itemsType
        ]);
    }

    /*
     * Площадь, где находятся такие локации, как лекарь и т.д.
     */
    public function square(Request $request, PlayerEntity $player, LocationEntity $location)
    {
        /** @var CurrentUser $user */
        $user = app(CurrentUser::class);

        $player = $user->getPlayer();

        $cityId = $user->getPlayer()->getCityId();

        $location = $this->repo->findBySlugAndCityId('square', $cityId);

        $title = $location->getTitle();
        $locations = $location->getChildren();


        return view(('locations.' . $location->getSlug()), [
            'title'     => $title,
            'player'    => $player,
            'locations' => $locations
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function healer(Request $request, PlayerEntity $player, LocationEntity $location)
    {
        /** @var CurrentUser $user */
        $user = app(CurrentUser::class);

        $player = $user->getPlayer();

        $cityId = $user->getPlayer()->getCityId();

        /** @var LocationEntity $location */
        $location = $this->repo->findBySlugAndCityId($request->route()->getName(), $cityId);

        $title = $location->getTitle();

        if ($location->getType() == Location::TYPES['market']) {
            $items = $this->repos[$request->route()->getName()]->all();
        } else {
            $items = $location->getChildren();
        }

        return view('locations.' . $location->getSlug(), [
            'title'  => $title,
            'player' => $player,
            'items'  => $items,
        ]);
    }


}

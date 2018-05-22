<?php

namespace App\Http\Controllers;

use App\Entities\User\PlayerEntity;
use App\Repositories\Locations\CityRepository;
use App\Repositories\Locations\LocationRepository;
use App\Repositories\User\PlayerRepository;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /** @var Auth */
    protected $user;
    /** @var PlayerEntity */
    protected $player;
    /** @var LocationRepository */
    protected $locationRepo;
    /** @var PlayerRepository */
    protected $playerRepo;
    /** @var CityRepository */
    protected $cityRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->cityRepo = app(CityRepository::class);

        $this->playerRepo = app(PlayerRepository::class);

        $this->locationRepo = app(LocationRepository::class);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->user = Auth::user();

        if (!$this->user->player) {
            return redirect(route('player::create'), 301);
        }
        $this->player = $this->playerRepo->findByUserId($this->user->id);

        $city = $this->cityRepo->find($this->player->getCityId());

        $locations = $city->getFirstLevelLocations();

        return view('home', [
            'items'  => $locations,
            'player' => $this->player,
        ]);
    }
}

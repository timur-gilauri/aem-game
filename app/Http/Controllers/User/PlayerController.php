<?php

namespace App\Http\Controllers;

use App\Entities\Locations\CityEntity;
use App\Entities\Locations\CountryEntity;
use App\Entities\User\PlayerEntity;
use App\Repositories\Locations\CountryRepository;
use App\Repositories\User\PlayerClassRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /** @var CountryRepository */
    protected $countryRepo;
    /** @var PlayerClassRepository */
    protected $playerClassRepo;

    public function __construct()
    {
        $this->middleware('auth');

        $this->countryRepo = app(CountryRepository::class);
        $this->playerClassRepo = app(PlayerClassRepository::class);

        parent::__construct();
    }

    public function index()
    {
        $user = Auth::user();
        /** @var PlayerEntity $player */
        $player = $this->playerRepo->findByUserId($user->id);

        return view('player.index', [
            'player' => $player
        ]);
    }

    public function bag(Request $request)
    {
        $user = Auth::user();
        /** @var PlayerEntity $player */
        $player = $this->playerRepo->findByUserId($user->id);

        return view('player.bag', [
            'player' => $player
        ]);
    }

    public function create()
    {
        $user = Auth::user();

        if ($user->has('player')) {
            return redirect(route('player::player'), 301);
        }
        /** @var Collection $countries */
        $countries = $this->countryRepo->all();
        /** @var Collection $playerClasses */
        $playerClasses = $this->playerClassRepo->all();

        return view('player.create', [
            'countries'     => $countries,
            'playerClasses' => $playerClasses
        ]);
    }

    public function save(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name'            => 'required|string|max:255',
            'country_id'      => 'required',
            'player_class_id' => 'required'
        ]);

        /** @var CountryEntity $country */
        $country = $this->countryRepo->find($request->get('country_id'));

        /** @var Collection $cities */
        $cities = $country->getCities();

        /** @var CityEntity $emptiestCity */
        $emptiestCity = $cities->reduce(function (CityEntity $minPlayersCity, CityEntity $currentCity) {
            return ($minPlayersCity->getPlayersAmount() < $currentCity->getPlayersAmount()) || $minPlayersCity->getPlayersAmount() == $currentCity->getPlayersAmount() ? $minPlayersCity : $currentCity;
        }, $cities->first());


        $entity = new PlayerEntity();

        $entity->setUserId($user->id);
        $entity->setName($request->get('name'));
        $entity->setNationId($country->getNation()->getId());
        $entity->setCityId($emptiestCity->getId());
        $entity->setCountryId($request->get('country_id'));
        $entity->setPlayerClassId($request->get('player_class_id'));
        $entity->setLevel(1);
        $entity->setExperience(100);
        $entity->setHealth(100);
        $entity->setPower($this->getRandDefaultValue());
        $entity->setDamage($this->getRandDefaultValue());
        $entity->setDefense($this->getRandDefaultValue());
        $entity->setAgility($this->getRandDefaultValue());
        $entity->setMoney($this->getRandDefaultValue());
        $entity->setSwords($this->getRandDefaultValue());
        $entity->setBows($this->getRandDefaultValue());
        $entity->setAxes($this->getRandDefaultValue());
        $entity->setDaggers($this->getRandDefaultValue());
        $entity->setHands($this->getRandDefaultValue());
        $entity->setHeavyArmor($this->getRandDefaultValue());
        $entity->setLightArmor($this->getRandDefaultValue());

        $this->playerRepo->save($entity);

    }

    /**
     * @return int
     */
    public function getRandDefaultValue(): int
    {
        return round(rand(1, 30));
    }
}

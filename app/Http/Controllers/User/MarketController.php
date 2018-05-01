<?php

namespace App\Http\Controllers;

use App\Entities\Stuff\ArmorEntity;
use App\Entities\Stuff\ElixirEntity;
use App\Entities\Stuff\WeaponEntity;
use App\Entities\User\BagEntity;
use App\Entities\User\PlayerEntity;
use App\Repositories\Stuff\ArmorRepository;
use App\Repositories\Stuff\ElixirRepository;
use App\Repositories\Stuff\WeaponRepository;
use App\Repositories\User\BagRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    /** @var BagRepository */
    protected $bagRepo;

    public function __construct()
    {
        $this->bagRepo = app(BagRepository::class);

        parent::__construct();
    }

    public function buyItem(Request $request)
    {
        $type = $request->route('type');
        /** @var PlayerEntity $player */
        $player = $this->playerRepo->findByUserId(Auth::id());
        /** @var BagEntity $bag */
        $bag = $player->getBag();
        $repos = [
            'elixir' => $elixirRepo = app(ElixirRepository::class),
            'armor'  => $armorRepo = app(ArmorRepository::class),
            'weapon' => $armorRepo = app(WeaponRepository::class),
        ];
        /** @var ArmorEntity|ElixirEntity|WeaponEntity $item */
        $item = $repos[$type]->find($request->route('id'));

        if (!$bag->full()) {
            $bag->addItem($type, $item);
            try {

                $player->setMoney($player->getMoney() - $item->getPrice());

                $this->bagRepo->save($bag);

                $this->playerRepo->save($player);

                $message = 'Теперь этот предмет в вашей сумке.';

            } catch (\Exception $error) {
                $message = $error->getMessage();
            }
        } else {
            $message = 'Ваша сумка полна.';
        }

        session()->flash('message', $message);

        return redirect()->back();

    }
}

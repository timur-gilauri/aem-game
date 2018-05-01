@extends('layouts.player')

@section('content')
    <div class="player-stats base-block-padding">
        <img class="player-stats__img"
             src="{{asset('images/classes/army/'.$player->getCountry()->getSlug().'.jpg')}}">
        <div class="geography-stats">
            <div class="stat-line">
                <div class="stat-line__name">Имя</div>
                <div class="stat-line__value">{{$player->getName()}}</div>
            </div>
            <div class="stat-line">
                <div class="stat-line__name">Страна</div>
                <div class="stat-line__value">{{$player->getCountry()->getTitle()}}</div>
            </div>
            <div class="stat-line">
                <div class="stat-line__name">Город</div>
                <div class="stat-line__value">{{$player->getCity()->getTitle()}}</div>
            </div>
        </div>
    </div>

    <hr>

    <ul class="nav nav-pills mb-3 base-block-padding player-stats__tabs" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="base-params-tab" data-toggle="pill" href="#pills-base-params" role="tab"
               aria-controls="pills-base-params" aria-selected="true">Основные</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="attack-skills-tab" data-toggle="pill" href="#pills-attack-skills" role="tab"
               aria-controls="pills-attack-skills" aria-selected="false">Боевые</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="defence-skills-tab" data-toggle="pill" href="#pills-defence-skills" role="tab"
               aria-controls="pills-defence-skills" aria-selected="false">Броня</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="active-stuff-tab" data-toggle="pill" href="#pills-active-stuff" role="tab"
               aria-controls="pills-active-stuff" aria-selected="false">Активные предметы</a>
        </li>
    </ul>
    <div class="tab-content player-tabs-content base-block-padding">
        <div class="tab-pane fade show active" id="pills-base-params" role="tabpanel" aria-labelledby="base-params-tab">
            <div class="row no-gutters">
                <div class="col-sm-5">
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Уровень</div>
                        <div class="stat-line__value ml-auto">{{$player->getLevel()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Опыт</div>
                        <div class="stat-line__value ml-auto">{{$player->getExperience()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Здоровье</div>
                        <div class="stat-line__value ml-auto">{{$player->getHealth()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Сила</div>
                        <div class="stat-line__value ml-auto">{{$player->getPower()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Урон</div>
                        <div class="stat-line__value ml-auto">{{$player->getDamage()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Защита</div>
                        <div class="stat-line__value ml-auto">{{$player->getDefense()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Ловкость</div>
                        <div class="stat-line__value ml-auto">{{$player->getAgility()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Деньги</div>
                        <div class="stat-line__value ml-auto">{{$player->getMoney()}}</div>
                    </div>
                </div>
            </div>

        </div>
        <div class="tab-pane fade" id="pills-attack-skills" role="tabpanel" aria-labelledby="attack-skills-tab">
            <div class="row no-gutters">
                <div class="col-sm-5">
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Мечи</div>
                        <div class="stat-line__value ml-auto">{{$player->getSwords()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Луки</div>
                        <div class="stat-line__value ml-auto">{{$player->getBows()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Топоры</div>
                        <div class="stat-line__value ml-auto">{{$player->getAxes()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Клинки</div>
                        <div class="stat-line__value ml-auto">{{$player->getDaggers()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Рукопашный бой</div>
                        <div class="stat-line__value ml-auto">{{$player->getHands()}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-defence-skills" role="tabpanel" aria-labelledby="defence-skills-tab">
            <div class="row no-gutters">
                <div class="col-sm-5">
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Навык тяжелой брони</div>
                        <div class="stat-line__value ml-auto">{{$player->getHeavyArmor()}}</div>
                    </div>
                    <div class="stat-line d-flex">
                        <div class="stat-line__name mr-auto">Навык легкой брони</div>
                        <div class="stat-line__value ml-auto">{{$player->getLightArmor()}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-active-stuff" role="tabpanel" aria-labelledby="active-stuff-tab">
            <div class="row no-gutters">
                <div class="col-sm-5">
                    ...
                </div>
            </div>
        </div>
    </div>



@endsection
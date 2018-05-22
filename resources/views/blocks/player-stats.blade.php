<div class="stats" data-stat="experience">
    <i class="far fa-star"></i>
    <div class="stat-value">{{$player->getExperience()}}</div>
</div>
<div class="stats" data-stat="level">
    <i class="fas fa-signal"></i>
    <div class="stat-value">{{$player->getLevel()}}</div>
</div>
<div class="stats" data-stat="health">
    <i class="far fa-heart"></i>
    <div class="stat-value">{{$player->getHealth()}}</div>
</div>
<span class="stats" data-stat="power">
  <i class="fas fa-bolt"></i>
  <span class="stat-value">{{$player->getPower()}}</span>
</span>
<div class="stats" data-stat="money">
    <i class="fas fa-dollar-sign"></i>
    <div class="stat-value">{{$player->getMoney()}}</div>
</div>


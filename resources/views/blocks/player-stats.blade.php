<div class="stats" data-stat="experience">
    <i class="icon fi-info"></i>
    <div class="stat-value">{{$player->getExperience()}}</div>
</div>
<div class="stats" data-stat="level">
    <i class="icon fi-arrow-up"></i>
    <div class="stat-value">{{$player->getLevel()}}</div>
</div>
<div class="stats" data-stat="health">
    <i class="icon fi-heart"></i>
    <div class="stat-value">{{$player->getHealth()}}</div>
</div>
<span class="stats" data-stat="power">
  <i class="icon fi-home"></i>
  <span class="stat-value">{{$player->getPower()}}</span>
</span>
<div class="stats" data-stat="money">
    <i class="icon fi-dollar"></i>
    <div class="stat-value">{{$player->getMoney()}}</div>
</div>


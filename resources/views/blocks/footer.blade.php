<footer>
    <a class="line_interact" href="{{route('player::bag')}}" title="Сумка">
        <i class="fi-torsos-all icon"></i>Моя сумка</a>
    @if(request()->route() && request()->route()->getName() != 'player::player')
        <a class="line_interact" href="{{ route('player::player') }}"><i class="icon fi-torso-business"></i>Мой
            герой</a>
    @endif
    @if(request()->route() && request()->route()->getName() != 'home')
        <a class="line_interact" href="{{ route('home') }}"><i class="icon fi-home"></i>На главную</a>
    @endif
    @if(!\Illuminate\Support\Facades\Auth::guest())
        <a class="line_interact"
           href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            <i class="icon fi-power"></i>Выйти
        </a>
    @endif
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
        {{ csrf_field() }}
    </form>
</footer>
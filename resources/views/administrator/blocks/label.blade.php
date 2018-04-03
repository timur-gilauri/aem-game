@php
    $color = $condition == 1 ? 'success' : 'secondary';
    $text = $condition == 1 ? ($textYes ?? 'вкл'): ($textNo ?? 'выкл');
@endphp
<span class="badge badge-{{$color}}" style="text-transform: uppercase;">{{$text}}</span>
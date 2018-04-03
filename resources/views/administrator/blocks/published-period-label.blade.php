@php
    $condition = \Carbon\Carbon::now()->gt($date);
    $textNo = 'Истёк срок публкации';
    $textYes = 'Публикация актуальна';
    $text = $condition ? $textYes: $textNo;
    $color = $condition ? 'success' : 'secondary';
@endphp
<span class="badge badge-{{$color}}" style="text-transform: uppercase;">{{$text}}</span>
<tr>
    <th>{{$item->getId()}}</th>
    <td>{{$item->getTitle()}}</td>
    <td>{{$item->getPriority()}}</td>
    <td>@include('administrator.blocks.label', ['condition' => (int)$item->getStatus()])</td>
    @include('administrator.blocks.control-buttons', ['page' => 'pages', 'id' => $item->getId()])
</tr>
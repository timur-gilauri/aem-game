<tr>
    <th>{{$item->getId()}}</th>
    <td>{{$item->getTitle()}}</td>
    @include('administrator.blocks.control-buttons', ['page' => 'countries', 'id' => $item->getId()])
</tr>
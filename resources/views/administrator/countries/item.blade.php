<tr>
    <th>{{$item->getId()}}</th>
    <td>{{$item->getName()}}</td>
    @include('administrator.blocks.control-buttons', ['page' => 'countries', 'id' => $item->getId()])
</tr>
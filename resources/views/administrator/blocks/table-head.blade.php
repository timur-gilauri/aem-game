<thead>
<tr>
    <th scope="col">Id</th>
    @foreach($columns as $column)
        <th scope="col">{{$column}}</th>
    @endforeach
    <th scope="col">Редактировать</th>
    <th scope="col">Удалить</th>
</tr>
</thead>
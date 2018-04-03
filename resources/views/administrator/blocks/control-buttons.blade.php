<td>
    <a class="btn btn-primary"
       href="{{route('admin::'.$page.'::edit', $id)}}">Редактировать</a>
</td>
<td>
    <a class="btn btn-danger remove-item-btn"
       data-href="{{route('admin::'.$page.'::delete', $id)}}">Удалить</a>
</td>
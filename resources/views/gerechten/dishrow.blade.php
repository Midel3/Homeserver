<tr id="dish_id_{{$gerecht->id}}">
    <td>
        <button type="button" id="open-add-dish-modal-btn" class= "btn btn-info pull-right" data-dish="{{$gerecht}}">
            <i class="fa fa-plus"></i>
        </button>
    </td>
    <td>{{$gerecht->naam}}</td>
    <td>{{$gerecht->ingredienten}}</td>
    <td>{{$gerecht->starch}}</td>
    <td>{{$gerecht->vlees}}</td>
    <td>
        <button type="button" id="edit-modal-btn" class= "btn btn-warning pull-right" data-dish="{{$gerecht}}">
            <i class="fa fa-edit"></i>
        </button>
    </td>
    <td>
        <button type="button" id="delete-dish-btn" class= "btn btn-danger pull-right" data-dish="{{$gerecht}}">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
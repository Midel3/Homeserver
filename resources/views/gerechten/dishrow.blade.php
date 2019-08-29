<tr id="dish_id_{{$gerecht->id}}" class="dishrow" data-dish="{{$gerecht}}">
    <td>
        <button type="button" id="open-add-dish-modal-btn" class= "btn btn-info" data-dish="{{$gerecht}}">
            <i class="fa fa-plus"></i>
        </button>
    </td>
    <td>{{$gerecht->naam}}</td>
    <td>{{$gerecht->starch}}</td>
    <td>{{$gerecht->vlees}}</td>
</tr>
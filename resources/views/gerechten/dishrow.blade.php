<tr>
    <td>{{$gerecht->naam}}</td>
    <td>{{$gerecht->ingredienten}}</td>
    <td>{{$gerecht->starch}}</td>
    <td>{{$gerecht->vlees}}</td>
    <td>
        <button type="button" id="edit-modal-btn" class= "btn btn-warning pull-right" data-dish="{{$gerecht}}">
            Edit
        </button>
    </td>
    <td>
        <button type="button" id="delete-dish-btn" class= "btn btn-info pull-right" data-dish="{{$gerecht}}">
            AJAX
        </button>
    </td>
    <td>
        <form action="{{action('GerechtController@deleteDish', $gerecht)}}" method="post">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Wil je dit gerecht verwijderen?')">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
$( document ).ready(function() {
    var currentWeek = $('#currentWeek').val();
    $('#weekToShow').val(currentWeek);
});

$(document).on('click', '#edit-modal-btn', function() {
    $('#edit-modal-title').text($(this).data('dish').naam);
    $('#edit-id').val($(this).data('dish').id);
    $('#edit-ingredienten').text($(this).data('dish').ingredienten);
    $('#edit-vlees').val($(this).data('dish').vlees);
    $('#edit-starch').val($(this).data('dish').starch);
    $('#editDishModal').modal('show');
});

$(document).on('click', '#delete-dish-btn', function () {
    var dish_name = ($(this).data('dish').naam);
    if (confirm('Wil je ' + dish_name + ' verwijderen?')) {
        var token = $("meta[name='csrf-token']").attr("content");
        var dish_id = ($(this).data('dish').id);
        $.ajax({
            url: '/gerechten/' + dish_id + '/delete',
            data: {"_token" : token},
            type: 'POST',
            success: function(data) {
                $("#dish_id_" + dish_id).remove();
            }
        });
    }
});

$(document).on('click', '#open-add-dish-modal-btn', function() {
    $('#add-dinner-title').text($(this).data('dish').naam);
    $('#week-dish-id').val($(this).data('dish').id);
    $('#addWeekDinnerModal').modal('show');
});

$(document).on('click', '#store-week-dinner-btn', function () {
    var dish_id = $('#week-dish-id').val();
    var year = $('#week-year').val();
    var week = $('#week-week').val();
    var day = $('#week-day').val();

    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        url: '/gerechten/' + dish_id + '/storeDishOnDay',
        data: {
            "_token" : token,
            "year" : year,
            "week" : week,
            "day" : day
        },
        type: 'POST',
        success: function(data) {
            $('#addWeekDinnerModal').modal('hide');
        },
        error: function (data) {
            console.log(data);
            alert('');
        }
    });
});
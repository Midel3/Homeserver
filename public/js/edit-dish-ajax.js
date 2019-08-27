

$( document ).ready(function() {
    var currentWeek = $('#currentWeek').val();
    $('#weekToShow').val(currentWeek);
    updatePlanning(currentWeek);
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
            updatePlanning(week);
        },
        error: function (data) {
            alert('');
        }
    });
});

$('#weekToShow').change(function () {
    updatePlanning($(this).val());
});

function updatePlanning(week) {
    emptyPlanning(showPlanning, week);
}

function emptyPlanning(showfunction, week) {
    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        type: "GET",
        url: "/gerechten/{}/getweekdays",
        data: {
            "_token" : token,
        },
        success: function (data) {
            var json = $.parseJSON(data);
            for (index in json) {
                var day = json[index];
                $('#plan_' + day).html('');
            }
            showfunction(week);
        }
    });
}

function showPlanning(week) {

    var token = $("meta[name='csrf-token']").attr("content");
    $.ajax({
        type: "POST",
        url: "/gerechten/{week}/getplanneddinners",
        data: {
            "_token" : token,
            "week" : week
        },
        success: function (data) {
            var json = $.parseJSON(data);
            var weekdinner;
            for (weekdinner in json) {
                var plannedMeal = json[weekdinner];
                $('#plan_' + plannedMeal.day).html('Broodje');
            }
        }
    });
}
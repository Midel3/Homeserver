

$(document).ready(showCurrentWeek);

$(document).on('click', '#this-week-btn', showCurrentWeek);

function showCurrentWeek() {
    updateShownWeek($('#currentWeek').val());
}

$(document).on('click', '#delete-dish-btn', function () {
    var dish_id = $(this).attr('data-dish_id');
    var dish_naam = $(this).attr('data-dish_naam');
    if (confirm('Wil je ' + dish_naam + ' verwijderen?')) {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: '/gerechten/' + dish_id + '/delete',
            data: {"_token" : token},
            type: 'POST',
            success: function() {
                $("#dish_id_" + dish_id).remove();
                $('#editDishModal').modal('hide');
            }
        });
    }
});

$(document).on('click', '#open-add-dish-modal-btn', function() {
    $('#add-dinner-title').text($(this).data('dish').naam);
    $('#week-dish-id').val($(this).data('dish').id);
    $('#editDishModal').modal('hide');
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
            $('#weekToShow').val(week);
            updateShownWeek(week);
        },
        error: function (data) {
            alert('Niet mogelijk');
        }
    });
});

$('body').on('click', '#delete-planneddish-btn', function () {
    var token = $("meta[name='csrf-token']").attr("content");
    var dish_id = $(this).attr('data-dish_id');
    $.ajax({
        type: "POST",
        url: "/gerechten/" + dish_id + "/deletePlannedMeal",
        data: {
            "_token" : token,
        },
        success: function (data) {
            updateShownWeek($('#weekToShow').val());
        },
        error: function (data) {
            alert('Geen maaltijd geselecteerd');
        }
    });
});

$('#weekToShow').change(function () {
    updateShownWeek($(this).val());
});

$(".dishrow").click(function () {
    $('#edit-modal-title').text($(this).data('dish').naam);
    $('#edit-id').val($(this).data('dish').id);
    $('#edit-ingredienten').text($(this).data('dish').ingredienten);
    $('#edit-vlees').val($(this).data('dish').vlees);
    $('#edit-starch').val($(this).data('dish').starch);
    $('#delete-dish-btn').attr('data-dish_naam', $(this).data('dish').naam);
    $('#delete-dish-btn').attr('data-dish_id', $(this).data('dish').id);
    $('#editDishModal').modal('show');
});

$(document).on('click', '#next-week-btn', function () {
    var nextweek = parseInt($('#weekToShow').val()) + 1;
    if (nextweek < 54) {
        updateShownWeek(nextweek);
    }
});

$(document).on('click', '#prev-week-btn', function () {
    var prevweek = $('#weekToShow').val() - 1;
    if (prevweek > 0) {
        updateShownWeek(prevweek);
    }
});

function updateShownWeek(week) {
    $('#weekToShow').val(week);
    $('#week-header').html('Week ' + week);
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
            for (var index in json) {
                var day = json[index];
                $('#plan_' + day + ' > #mealname').html('');
                $('#plan_' + day + ' > #btn > #delete-planneddish-btn').attr('data-dish_id', '').hide();
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
            for (var day in json) {
                var plannedMeal = json[day];
                var mealname = 'onbekend';
                if (plannedMeal.gerecht) {
                    mealname = plannedMeal.gerecht.naam;
                }
                $('#plan_' + plannedMeal.day + ' > #mealname').html(mealname);
                $('#plan_' + plannedMeal.day + ' > #btn > #delete-planneddish-btn').attr('data-dish_id', plannedMeal.id).show();
            }
        }
    });
}
$(document).on('click', '#edit-modal-btn', function() {
    $('#edit-modal-title').text($(this).data('dish').naam);
    $('#edit-id').val($(this).data('dish').id);
    $('#edit-ingredienten').text($(this).data('dish').ingredienten);
    $('#edit-vlees').val($(this).data('dish').vlees);
    $('#edit-starch').val($(this).data('dish').starch);
    $('#editDishModal').modal('show');
});
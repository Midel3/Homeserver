$(document).on('click', '.edit-modal', function() {
    $('.modal-title').text($(this).data('id'));
    // $('.modal-title').val($(this).data('id'));
    $('#editDishModal').modal('show');
});
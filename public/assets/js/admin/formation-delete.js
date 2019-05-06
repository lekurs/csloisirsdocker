$(document).ready(function () {
    const deleteIcon = $('i.fa-trash');

    $(deleteIcon).on('click', function () {
        let elt = $(this);
        let id = $(this).attr('data-id');

        $.post('/admin/formation/delete/'+id, function (data) {

        }).done(function () {
            $(elt).closest('tr').remove();
        });
    });
});
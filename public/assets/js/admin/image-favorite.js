$(document).ready(function () {
    const star = $('.fa-star');

    $(star).on('click', function () {
        let elt = $(this);
        let id = $(this).attr('data-id');

        $.post('/admin/image/edit/'+id, function (data) {

        }).done(function () {
            $(elt).toggleClass('gold');
        });
    });
});
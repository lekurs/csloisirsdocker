$(document).ready(function () {
    const deleteIcon = $('.fa-trash');

    $(deleteIcon).on('click', function () {
        let idImage = $(this).closest('.img-container').find('.product-image').attr('data-id');
        let elt = $(this);

        $.post('/admin/product/image/del/'+idImage, function (data) {

        }).done(function () {
            $(elt).parent().closest('.img-container').remove();
        });
    });
});
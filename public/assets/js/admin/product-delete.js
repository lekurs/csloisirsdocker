$(document).ready(function () {
    const deleteIcon = $('.fa-trash.del-product');

    $(deleteIcon).on('click', function (e) {
        e.preventDefault();
        let idProduct = $(this).attr('data-id');
        let elt = $(this);

        $.post('/admin/product/del/'+idProduct, function (data) {

        }).done(function () {
            $(elt).parent().closest('tr').remove();
        });
    });
});
$(document).ready(function () {
    const categoryContainer = $('.category-editable');

        $(categoryContainer).on('click', function () {

            let id = $(this).attr('data-id');

            $(this).on('focusout', function () {
                let title = $(this).text();

                $.ajax({
                    url: '/admin/category/edit/'+id,
                    method: 'POST',
                    data: 'title=' + title
                });
            });
        });
});
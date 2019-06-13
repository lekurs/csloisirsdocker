$(document).ready(function () {
    const miniatures = $('img.slide-img');
    const bigger = $('img.main-image');

    $(miniatures).on('click', function (e) {
        e.preventDefault();

        $(bigger).attr('src', $(this).attr('src'));

    });
});
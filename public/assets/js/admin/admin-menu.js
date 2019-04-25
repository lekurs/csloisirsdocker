$(document).ready(function () {
    const contentNav = $('.admin-nav-content');
    const submenu = $('.admin-nav-submenu');

    $(contentNav.each(function () {
        $(this).on('click', function () {
            $(submenu).removeClass('admin-nav-submenu-active');
            // if (!$(this).find(submenu).hasClass('admin-nav-submenu-active')) {
            //
            // }
                $(this).find(submenu).toggleClass('admin-nav-submenu-active');
        });
    }));
});
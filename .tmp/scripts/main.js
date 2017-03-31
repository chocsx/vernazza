$(document).ready(function () {
    $('button.hamburger').click(function () {
        $('nav.menu-suspenso').toggleClass('open');
        $('.hamburger').toggleClass('is-active');
    });

    $('.slider').slick({
        infinite: true,
        arrows: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $('.menu-suspenso a, .scrollTop').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('href'),
            targetOffeset = $(id).offset().top;
        $('html, body').animate({
            scrollTop: targetOffeset
        }, 500);
        $('nav.menu-suspenso').removeClass('open');
        $('.hamburger').removeClass('is-active');
    });
    $('#form-submit').click(function () {
        swal('Obrigado!', 'Logo mais entraremos em contato com você!', 'success');
        return false;
    });
});
//# sourceMappingURL=main.js.map

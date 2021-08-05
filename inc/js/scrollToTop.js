$(document).ready(function() {

    $(window).scroll(function() {
        if($(this).scrollTop() > 200) {
            $('#scrollToTopBtn').fadeIn();
        } else {
            $('#scrollToTopBtn').fadeOut();
        }
    });

    $('#scrollToTopBtn').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 400, 'swing');
        return false;
    });
});

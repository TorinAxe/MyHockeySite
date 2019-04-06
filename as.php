<script src='http://dwweb.ru/__a-data/js/jquery-3.3.1.min.js'></script>
<style>
/* #BACK TO TOP BUTTON
================================================== */
#back-top {
position: fixed;
    bottom: 25px;
    right: 25px;
    padding:0;
    margin:0;
    display: none;
    z-index: 999;
}
#back-top a {
    text-decoration: none;
    width: 38px;
    height: 38px;
    display: block;
    background-color: #2f343a;
    background-image: url(http://dwweb.ru/__DATA/images/back-top.png);
    background-repeat: no-repeat;
    background-position: center center;
    z-index:999;
    opacity:0.5;
}
#back-top a:hover {
    background-color: #2f343a;
    background-image: url(http://dwweb.ru/__DATA/images/back-top.png);
    background-repeat: no-repeat;
    background-position: center center;
    opacity:1;
}
</style>

<script>
$(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
        if ($('#back-top').is(':hidden')) {
            $('#back-top').css({opacity : 1}).fadeIn('slow');
            }
    } else { $('#back-top').stop(true, false).fadeOut('fast'); }
});
    $('#back-top').click(function() {
        $('html, body').stop().animate({scrollTop : 0}, 300);
    });
</script>
<p id="back-top" > <a href="#top" title="Back to Top"><span></span></a> </p>
// BACK TO TOP BUTTON

$().ready(function(){
  var offset = $('.top-nav').height();
  var duration = 300;

  $('.back-to-top').css( "display", "none" );

  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.back-to-top').fadeIn(duration);
    } else {
      jQuery('.back-to-top').fadeOut(duration);
    }
  });

  jQuery('.back-to-top').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  });

}); // END BACK TO TOP BUTTON

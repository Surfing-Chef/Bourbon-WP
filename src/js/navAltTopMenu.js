// NAVIGATION: ALT TOP MENU

$().ready(function(){

  $('.top-nav-alt').css( "display", "none" );

  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.top-nav-alt').fadeIn(duration);
    } else {
      jQuery('.top-nav-alt').fadeOut(duration);
    }
  });

}); //END: NAVIGATION: ALT TOP MENU

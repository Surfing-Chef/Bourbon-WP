// Adds animation effects to images using

$().ready(function() {
  $( '.callout-container' ).css( "visibility", "visible" );

  $('.callout-container').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated bounceInDown',
    offset: 0
   });

  $('.wp-post-image').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated fadeInUp',
    offset: 0
   });

});

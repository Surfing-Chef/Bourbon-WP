"use strict";

// ANIMATION EFFECTS

$().ready(function () {
  // Home page header animation
  $('.callout-container').css("visibility", "visible");

  $('.callout-container').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated bounceInDown',
    offset: 0
  });

  //Post image animation
  $('.wp-post-image').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated fadeInUp',
    offset: 0
  });
});
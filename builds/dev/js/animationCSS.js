'use strict';

// CSS Animations

// reset on end
var animReset = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

// hover animation
function animationHover(element, animation) {
  element = $(element);
  element.hover(function () {
    $(this).addClass('animated ' + animation).one(animReset, function () {
      $(this).removeClass('animated ' + animation);
    });
  }, function () {
    // mouseOut function
  });
}

// click animation
function animationClick(element, animation) {
  element = $(element);
  element.click(function () {
    $(this).addClass('animated ' + animation).one(animReset, function () {
      $(this).removeClass('animated ' + animation);
    });
  });
}

// main Navigation
animationHover('.menu-image-title-after', 'pulse');

// footer icons
animationHover('.icon', 'flipInY');
animationClick('.icon', 'rubberBand');
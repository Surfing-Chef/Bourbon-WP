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
'use strict';

// BACK TO TOP BUTTON

$().ready(function () {
  var offset = $('.top-nav').height();
  var duration = 900;

  $('.back-to-top').css("display", "none");

  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.back-to-top').fadeIn(duration);
    } else {
      jQuery('.back-to-top').fadeOut(duration);
    }
  });

  jQuery('.back-to-top').click(function (event) {
    event.preventDefault();
    jQuery('html, body').animate({ scrollTop: 0 }, duration);
    return false;
  });
}); // END BACK TO TOP BUTTON
"use strict";

// EXPANDER
$().ready(function () {
  $(document).ready(function () {
    $('.expander-trigger').click(function () {
      $(this).toggleClass("expander-hidden");
    });
  });
}); // END EXPANDER
"use strict";

// ANIMATION EFFECTS

$().ready(function () {
  // Home page header animation
  $('.callout-container').css("visibility", "visible");

  $('.callout-container').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated bounceInDown',
    offset: 0
  });

  // Post image animation
  $('.post-thumbnail .wp-post-image').addClass("hidden").viewportChecker({
    classToAdd: 'visible animated fadeInUp',
    offset: 0
  });
});
'use strict';

// NAVIGATION: ALT TOP MENU

$().ready(function () {

  var offset = $('.top-nav').height();
  var duration = 300;

  $('.top-nav-alt').css("display", "none");

  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.top-nav-alt').fadeIn(duration);
    } else {
      jQuery('.top-nav-alt').fadeOut(duration);
    }
  });
}); //END: NAVIGATION: ALT TOP MENU
"use strict";

// RESPONSIVE MENU
$(window).resize(function () {
  var more = document.getElementById("js-navigation-more");
  if ($(more).length > 0) {
    var windowWidth = $(window).width();
    var moreLeftSideToPageLeftSide = $(more).offset().left;
    var moreLeftSideToPageRightSide = windowWidth - moreLeftSideToPageLeftSide;

    if (moreLeftSideToPageRightSide < 330) {
      $("#js-navigation-more .submenu .submenu").removeClass("fly-out-right");
      $("#js-navigation-more .submenu .submenu").addClass("fly-out-left");
    }

    if (moreLeftSideToPageRightSide > 330) {
      $("#js-navigation-more .submenu .submenu").removeClass("fly-out-left");
      $("#js-navigation-more .submenu .submenu").addClass("fly-out-right");
    }
  }
});

$(document).ready(function () {
  var menuToggle = $("#js-mobile-menu").unbind();
  $("#js-navigation-menu").removeClass("show");

  menuToggle.on("click", function (e) {
    e.preventDefault();
    $("#js-navigation-menu").slideToggle(function () {
      if ($("#js-navigation-menu").is(":hidden")) {
        $("#js-navigation-menu").removeAttr("style");
      }
    });
  });
});
"use strict";

// $(window).scroll(function(){
//
//   // SCREEN VARIABLES
//   var wScroll = $(this).scrollTop();
//
//   $('.callout').css({
//     'transform' : 'translate(0px, '+ wScroll *0.4 +'px)'
//   });
//
// });

// SCROLLING HEADER
$(document).ready(function () {
  if ($("#js-parallax-window").length) {
    parallax();
  }
});

$(window).scroll(function (e) {
  if ($("#js-parallax-window").length) {
    parallax();
  }
});

function parallax() {
  if ($("#js-parallax-window").length > 0) {
    var plxBackground = $("#js-parallax-background");
    var plxWindow = $("#js-parallax-window");

    var plxWindowTopToPageTop = $(plxWindow).offset().top;
    var windowTopToPageTop = $(window).scrollTop();
    var plxWindowTopToWindowTop = plxWindowTopToPageTop - windowTopToPageTop;

    var plxBackgroundTopToPageTop = $(plxBackground).offset().top;
    var windowInnerHeight = window.innerHeight;
    var plxBackgroundTopToWindowTop = plxBackgroundTopToPageTop - windowTopToPageTop;
    var plxBackgroundTopToWindowBottom = windowInnerHeight - plxBackgroundTopToWindowTop;
    var plxSpeed = 0.35;

    plxBackground.css('top', -(plxWindowTopToWindowTop * plxSpeed) + 'px');
  }
}
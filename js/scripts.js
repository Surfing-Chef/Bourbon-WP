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
// // darksky.js //
// // Uses ajax and jsonp to retreive current weather and forecasts
// // Powered by Dark Sky
// //------------------------------------------------------------------//
//
// var srcBase = "http://localhost:3000/bourbon-wp/wp-content/themes/bourbon-wp/src/";
// // Load api
// $.ajax({
//    url: templateDir + '/darksky.json',
//    async: false,
//    dataType: 'json',
//    success: function (data) {
//        mydata = data;
//        myapi = data.api;
//    },
//    error: function () {
//      alert("Oops! Something went wrong while loading the Dark Sky API.");
//    }
// });
//
// // VARIABLES
// var api = myapi;
// var urlBase = 'https://api.darksky.net/forecast/';
// // Nakusp Hotsprings
// var latitude = '50.2963';
// var longitude = '-117.6857';
// var loc = latitude +','+ longitude;
// var units = 'auto';
// var url = urlBase + api + '/' + loc + '?units=' + units;
// var dsForecastUrl = "https://darksky.net/forecast/"+loc+"/ca12/en";
//
// // Create the function the JSON data will be passed to.
// function weatherData(json) {
//   // test container
//   if (document.getElementById('weather')) {
//     target = document.getElementById('weather');
//   } //element exists in the document.
//   else {
//     return;
//   }
//
//   // current date (timestamp)
//   //unixDate = unx;
//
//   // Convert timestamp into an array
//   function dateTime(aDate, request){
//     // Date from converted timestamp
//     rawDate = aDate;
//     // Convert to string...
//     strDate = rawDate.toString();
//     // String to array
//     arrDate = strDate.split(' ');
//     // Return requested data from array
//     if(request == "date"){
//       return arrDate[1] +" "+ arrDate[2] +", "+ arrDate[3];
//     } else if (request == "time") {
//       return arrDate[4];
//     } else {
//       return "Today...";
//     }
//   }
//
//   // Currently
//   ds_current_timestamp  = json.currently.time;
//   ds_current_full_date = Date(ds_current_timestamp);
//   ds_current_date = dateTime(ds_current_full_date, 'date');
//   updated = dateTime(ds_current_full_date, 'time');
//   currently  = json.currently.summary;
//   currently_icon  = json.currently.icon;
//   currently_temp  = Math.round(json.currently.temperature);
//   apparent_temp  = Math.round(json.currently.apparentTemperature);
//
//   // Forecast summaries
//   st_forecast_summary  = json.hourly.summary;
//   lt_forecast_summary  = json.daily.summary;
//
//   // Create Weather Widget
//   target.innerHTML =
//     "<span class=\"gps\">"+latitude+", "+longitude+"</span>"+
//     "<span>Backcountry Near Nakusp, British Columbia</span>"+
//     "<img src=\""+srcBase+"images/"+currently_icon+".png\" alt=\""+currently_icon+"\">"+
//     "<span class=\"currently\">"+currently+"</span>"+
//     "<span class=\"cur-temp\">Temperature is: "+currently_temp+"</span>"+
//     "<span class=\"app-temp\">Feels Like: "+apparent_temp+"</span>"+
//     "<span class=\"st-forecast\">Short Term: "+st_forecast_summary+"</span>"+
//     "<span class=\"lt-forecast\">Long Term: "+lt_forecast_summary+"</span>"+
//     "<span class=\"updated\">updated: "+ds_current_full_date+"</span>";
// }
//
// // load Darksky JSON data
// $.ajax({
//   type: "GET",
//   url: url,
//   dataType: 'jsonp',
//   jsonpCallback: 'weatherData', // the function to call
//   jsonp: 'callback', // name of the var specifying the callback in the request
//   error: function () {
//     alert("Oh oh! Had a hiccup getting weather data from Dark Sky." );
//   }
// });
"use strict";
// // QUOTE FUNCTION 
//
// $(document).ready(function() {
//
// // Define a quote library
//   var quoteSource=[
//   {
//     quote: "If you want to become a great chef, you have to work with great chefs. And that's exactly what I did.",
//     name:"Gordon Ramsay"
//     },
//     {
//       quote:"You can call me the bad boy chef all you want. I'm not going to freak out about it. I'm not that bad. I'm certainly not a boy, and it's been a while since I've been a chef.",
//       name:"Anthony Bourdain"
//     },
//     {
//       quote:"It does not matter how slowly you go as long as you do not stop.",
//       name:"Confucius"
//     },
//     {
//       quote:"Our greatest weakness lies in giving up. The most certain way to succeed is always to try just one more time.",
//       name:"Thomas A. Edison"
//     },
//     {
//       quote:"If you're not the one cooking, stay out of the way and compliment the chef.",
//       name:"Michael Strahan"
//     },
//     {
//       quote:"A home cook who relies too much on a recipe is sort of like a pilot who reads the plane’s instruction manual while flying.",
//       name:"Alton Brown"
//     },
//     {
//       quote:"First, knife skills. Then, knowing how to control heat. Most important is choosing the right product... the rest is simple.",
//       name:"Justin Quek"
//     },
//     {
//       quote:"A creative man is motivated by the desire to achieve, not by the desire to beat others.",
//       name:"Ayn Rand"
//     },
//     {
//       quote:"When baking, follow directions. When cooking, go by your own taste",
//       name:"Laiko Bahrs"
//     },
//     {
//       quote:"Fish, to taste right, must swim three times – in water, in butter and in wine.",
//       name:"Polish proverb"
//     },
//     {
//       quote:"We're hoping to succeed; we're okay with failure. We just don't want to land in between.",
//       name:"David Chang"
//     },
//     {
//       quote:"A great restaurant doesn't distinguish itself by how few mistakes it makes but by how well they handle those mistakes.",
//       name:"Danny Meyer"
//     },
//     {
//       quote:"Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.",
//       name:"Albert Einstein"
//     },
//     {
//       quote:"When you have made as many mistakes as I have then you can be as good as me.",
//       name:"Wolfgang Puck"
//     },
//     {
//       quote:"I would much rather be a chef who remembers I am a cook then a cook that thinks I am a chef.",
//       name:"Richard (Ric) Peterson"
//     },
//     {
//       quote:"I love the man that can smile in trouble, that can gather strength from distress, and grow brave by reflection. ’Tis the business of little minds to shrink, but he whose heart is firm, and whose conscience approves his conduct, will pursue his principles unto death.",
//       name:"Thomas Paine"
//     },
//     {
//       quote:"Successful people do what unsuccessful people are not willing to do. Don’t wish it were easier, wish you were better.",
//       name:"Jim Rohn"
//     },
//     {
//       quote:"Twenty years from now you will be more disappointed by the things that you didn’t do than by the ones you did do, so throw off the bowlines, sail away from safe harbor, catch the trade winds in your sails. Explore, Dream, Discover.",
//       name:"Mark Twain"
//     },
//     {
//       quote:"There are two types of people who will tell you that you cannot make a difference in this world: those who are afraid to try and those who are afraid you will succeed.",
//       name:"Ray Goforth"
//     },
//     {
//       quote:"There will be obstacles. There will be doubters. There will be mistakes. But with hard work, there are no limits.",
//       name:"Michael Phelps"
//     },
//     {
//       quote:"When I was 5 years old, my mother always told me that happiness was the key to life. When I went to school, they asked me what I wanted to be when I grew up. I wrote down “happy”. They told me I didn’t understand the assignment, and I told them they didn’t understand life.",
//       name:"John Lennon"
//     },
//     {
//       quote:"Vegetarians, and their Hezbollah-like splinter faction, the vegans ... are the enemy of everything good and decent in the human spirit.",
//       name:"Anthony Bourdain"
//     },
//     {
//       quote:"Oh, I'll accomodate them, I'll rummage around for something to feed them, for a 'vegetarian plate', if called on to do so. Fourteen dollars for a few slices of grilled eggplant and zucchini suits my food cost fine.",
//       name:"Anthony Bourdain"
//     },
//     {
//       quote:"Few things are more beautiful to me than a bunch of thuggish, heavily tattooed line cooks moving around each other like ballerinas on a busy Saturday night. Seeing two guys who'd just as soon cut each other's throats in their off hours moving in unison with grace and ease can be as uplifting as any chemical stimulant or organized religion.",
//       name:"Anthony Bourdain"
//     }
//
//   ];
//
//   // Get a new random number based on number of quotes
//   var sourceLength = quoteSource.length;
//   var randomNumber= Math.floor(Math.random()*sourceLength);
//
//   // Set a new quote
//   for(i=0;i<=sourceLength;i+=1){
//     var newQuoteText = quoteSource[randomNumber].quote;
//     var newQuoteGenius = quoteSource[randomNumber].name;
//     var quoteContainer = $('.callout-container');
//
//     quoteContainer.html('');
//     quoteContainer.append('<p class="quote">'+newQuoteText+'</p>'+'<p class="author">'+newQuoteGenius+'</p>');
//   } //end for loop
//
// }); // END QUOTE FUNCTION
"use strict";
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
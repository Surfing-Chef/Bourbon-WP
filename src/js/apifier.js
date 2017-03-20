// apifier.js //
// Uses ajax and jsonp to retreive feeds from
// Epicurious.com, Food52.com, LuckyPeach.com,
// Saveur.com and Foodandwine.com
//------------------------------------------------------------------//

// Load Apifier API
$.ajax({
   url: templateDir + '/apifier.json',
   async: false,
   dataType: 'json',
   success: function (data) {
       //apifierData = data;
       apifierApi = data.user;
   },
   error: function() {
        alert("Darn it! The Apifier API wasn't loaded.");
      }
});

// VARIABLES
var prefix = 'https://api.apifier.com/v1/';
var api = apifierApi;
var crawlId = '359hHayJT8Cefmu2R';
var suffix = '/crawlers/'+crawlId+'?token=rQCrS5BnTTp3J46P7SkxHam89';
var urlSettings = prefix + apifierApi + suffix;

// Load apifier settings
$.ajax({
   url: urlSettings,
   async: false,
   dataType: 'json',
   success: function (data) {
     apifierSettings = data.lastExecution.resultsUrl;
   },
   error: function(XMLHttpRequest, textStatus, errorThrown) {
        alert("Oops! The Apifier settings weren't found.");
      }
});

// Function :: displayApifier()
// parses JSON returned from Apifier
function displayApifier(obj){
  var temp = [];
  var feedArray = [];

  // Sort all object arrays
  Object.keys(obj).forEach(function(key){
    temp.push(obj[key].pageFunctionResult);
  });

  // Discard empty arrays
  for(var a=0; a<temp.length; a++){
    for(var b=0; b<5; b++){
      if(temp[a][b].length > 0){
        feedArray.push(temp[a][b]);
      }
    }
  }

  // Create objects for easy deployment to page:
  // base, imageUrl, linkUrl, title, topic
  var saveur = feedArray[0];
  var foodandwine = feedArray[1];
  var food52 = feedArray[2];
  var luckypeach = feedArray[3];
  var cooksillustrated = feedArray[4];

  // Add a label value to each array
  saveur.name = 'saveur';
  foodandwine.name = 'foodandwine';
  food52.name = 'food52';
  luckypeach.name = 'luckypeach';
  cooksillustrated.name = 'cooksillustrated';

  // Function :: show()
  // displays each item where appropriate,
  // for css formatting
  function show(obj){
    // get object name
    var objName = obj.name;
    var link = '';

    obj.forEach(function(dta){
      // Check if links have http prefix...
      var link = '';
      if(dta.linkUrl.startsWith('http://')){
        link_url = dta.linkUrl;
      } else {
        link_url = dta.base + dta.linkUrl;
      }

      // Create a div containing an image link and title
      var tag = $('<div class="culinaria-feed-container">'+
      '<a href="' + link_url + '" target="_blank">'+
      '<div class="image-container" style="background-image: url(\''+ dta.imageUrl +'\')">'+
      // '<img class="culinaria-feed-image" src="' + dta.imageUrl + '" alt="' + dta.title + '">'+
      '</div>'+
      '<span>'+dta.title+'</span>'+
      '</a></div>');

      // Append new tag within parent
      $("#"+objName).append(tag);

    });
  }

  // Display feeds as defined
  show(saveur);
  show(foodandwine);
  show(food52);
  show(luckypeach);
  show(cooksillustrated);
}

// load APLIFIER data
$.ajax({
  url: apifierSettings,
  async: false,
  dataType: 'json',
  success: function (data) {
    displayApifier(data);
  },
  error: function(XMLHttpRequest, textStatus, errorThrown) {
       alert("Oh snap! Data from Apifier wasn't loaded.");
     }
});

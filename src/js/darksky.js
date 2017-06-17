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

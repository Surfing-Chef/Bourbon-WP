$(document).ready(function() {
  var iconStartW = $(".icon").width();
  var iconStartH = $(".icon").height();
  var icon = $(".icon")
  .hover( function(){
    TweenLite.to(this, 0.1, {scaleX:1.05, scaleY:1.05});
  }, function(){
    TweenLite.to(this, 0.3, {scaleX:1, scaleY:1});
  });
});

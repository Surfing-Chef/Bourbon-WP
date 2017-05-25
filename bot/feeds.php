<?php
// site specifics
require_once("parseFunctions.php");

$sites ="./sites.json";

// Location of the feed cache
// Varies from local to remote environment,
// as cronjob vs windows schedule may require different paths.
//LOCAL/DEVELOPMENT
//$cache = "C:/wamp64/www/Bourbon-WP/wp-content/themes/bourbon-wp/bot/cache.txt";
//remote
$cache = echo home_url()."/bot/cache.txt";

$sites_json = file_get_contents($sites);

$sites_arr = json_decode($sites_json, true);

$feed_container = array();

function get_http_response_code($site_url) {

  $headers = get_headers($site_url);
  return substr($headers[0], 9, 3);

}

function get_details($site_name, $site_url){

  $site_data = array();

  global $feed_container;

  switch ($site_name) {
    case "Epicurious" :
      $site_data = epicurious($site_name, $site_url);
      break;
    case "Saveur" :
      $site_data = saveur($site_name, $site_url);
      break;
    case "Food and Wine" :
      $site_data = foodandwine($site_name, $site_url);
      break;
    case "Food 52" :
      $site_data = food52($site_name, $site_url);
      break;
    case "Silver Surfers" :
      $site_data = silversurfers($site_name, $site_url);
      break;
    case "UCLA | Science and Food" :
      $site_data = ucla($site_name, $site_url);
      break;
    case "Chowhound" :
      $site_data = chowhound($site_name, $site_url);
      break;
    case "Foodtank" :
      $site_data = foodtank($site_name, $site_url);
      break;
    case "NPR | The Salt" :
     $site_data = thesalt($site_name, $site_url);
      break;
    case "Allrecipes" :
      $site_data = allrecipes($site_name, $site_url);
      break;
    case "Kitchn" :
      $site_data = kitchn($site_name, $site_url);
      break;
    case "Huffington Post | Taste" :
      $site_data = taste($site_name, $site_url);
      break;
  }

  if(!is_null($site_data)){
    $feed_container[] = array
    (
      $site_data[0],
      $site_data[1],
      $site_data[2],
      $site_data[3],
      $site_data[4]
    );
  } else {
    //  send msg to log?
  }

}

function follow_links($sites_arr){
  global $feed_container;
  global $cache;

  foreach ($sites_arr as $site){

    $site_name = $site['site-name'];
    $site_url =  $site['site-url'];

    echo $site_name."\n";

    $response_code = get_http_response_code($site_url);

    if ($response_code === "200"){
      get_details($site_name, $site_url);
    } else {
      continue;
    }

  }

  $feed_container_string = serialize($feed_container);

  file_put_contents($cache, $feed_container_string);

}

function build_feed($sites_arr){
  global $cache;

  $current_time = time();

  $target_time = 60*60*12;

  @$cache_time = filemtime($cache);

  $age = $current_time - $cache_time;

  $size = @strlen(file_get_contents($cache));

  if (time() - $target_time > $cache_time || !$cache_time || $size < 50 ){

    echo follow_links($sites_arr)."\n";
  } else {

    exit;
  }
}

build_feed($sites_arr);

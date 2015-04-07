<?php
session_start();
require_once("twitteroauth/twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "mpatrickthomas";
$notweets = 30;
$consumerkey = "FepqVrTufu08vscEyCJfnEVEr";
$consumersecret = "rgxi59PQME6VWALkkjz5XAU8YfvgqyZ8LOgE2gJgwsjckHlift";
$accesstoken = "348628614-D55nGF8xB9rd1fozRReyGEH1Hh4zLahaQTJJrkHz";
$accesstokensecret = "3mhhN640wELeOAkuhZnFbJ5SgadLWxfj5JK1Ub0WFAP0T";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=%23fitness&language=en");
 
echo json_encode($tweets);
?>
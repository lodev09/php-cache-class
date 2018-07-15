<?php
//load composer packages
require('vendor/autoload.php');

//require the class
require_once("lib/FileCache.php");

//create new instance of the class
use rothkj1022\FileCache;
$cache = new FileCache\FileCache("tmp/");

$cache_key = "client_list";

//see if we can get an existing cache
if (!$clients_data = $cache->get($cache_key)) {
    //nope. Let's get the real one then!
    $clients_data = json_decode(file_get_contents("clients.json"));

    //set the cache up!
    $expire = 3600; //1 hour
    $cache->set($cache_key, $clients_data, $expire);
}
var_dump($clients_data);

//get external url, and cache the contents
$uri = 'https://raw.githubusercontent.com/bahamas10/css-color-names/master/css-color-names.json';
$remote_data = $cache->file_get_contents($uri);
var_dump($remote_data);

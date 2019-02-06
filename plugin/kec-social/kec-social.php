<?php
/*
Plugin Name: Kec Social
Plugin URI: https://kingeclient.com/
Description: Adds customer social links ( Facebook and Twitter ) on a sidebar.
Version: 1.0
Author: @adolfodcaro
Author URI: elephantavenue.com
License: MTI
*/

defined('ABSPATH') or die("Bye bye");

require_once 'vendor/autoload.php';


$plugin = new \Kecsocial\Plugin();
$plugin->init();




<?php

/**
 * Plugin Name: AJY Environment Indicator
 * Plugin URI: http://ajy.co
 * Description: Add an IP address indicator and a favicon badge on development environments.
 * Version: 1.0.0
 * Author: Aaron James Young
 * Author URI: http://ajy.co
 * License: GPL2
 */

// todo: edit the above URL's as necessary
// todo: Options interface to set the excluded IP
// Possible todo: Allow setting up different environments:
// * per IP - set a label
// * per IP - set a color for the favicon badge

// This plugin inserts an indicator of the website IP at bottom right of screen.
// It also will add a small badge to your favicon (IF you have one).
// The badge will indicate the first section of your IP address.

// You can set an excluded IP (for your live environment, obviously) below:

// Config: Set live server IP here:
$live_server = '72.10.52.144';

// ... and off we go:
if($_SERVER['SERVER_ADDR'] != $live_server) {
  // Enqueue script
  add_action('admin_enqueue_scripts', 'ajy_enqueue_scripts'); //admin area
  ajy_enqueue_scripts(); // this should get the front end

  // Perform the action of adding the HTML
  add_action('wp_footer', 'ajy_add_indicator');
  add_action('admin_footer', 'ajy_add_indicator');
}

function ajy_enqueue_scripts() {
  wp_enqueue_script( 'favico', plugin_dir_url( __FILE__ ).'favico.js', '', '20150130', false );
}

function ajy_add_indicator() {
  $ip_arr = explode('.', $_SERVER['SERVER_ADDR']);
  $ip_first = $ip_arr[0];

  // Start buiding a string
  $str .= '<div class="ajy-server-info">';
  $str .= $_SERVER['SERVER_ADDR'];
  $str .= '</div>';

  $str .= '<style>div.ajy-server-info {
    position: fixed; bottom: 0; right: 0; padding: 5px; margin: 0;
    background-color: rgba(255,255,255,0.5); border-top: 1px solid #cccccc; border-left: 1px solid #cccccc;
    font-size: 12px !important; font-family: sans-serif !important; color: rgba(168, 168, 168) !important;
    line-height: 1 !important;
    z-index: 9999; vertical-align: baseline; border-top-left-radius: 3px; pointer-events: none;
  }</style>';

  $str .= "<script>
    var favicon = new Favico({
      type : 'rectangle'
    });
    favicon.badge(".$ip_first.");
  </script>"; // mind the quote style

  echo $str;
}

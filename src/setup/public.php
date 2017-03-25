<?php 

function dmo_enqueue_css() {
  wp_enqueue_style('tourismpress_css', plugins_url() . '/tourismpress/css/tourismpress.min.css');
}
add_action('init','dmo_enqueue_css');

function dmo_enqueue_script() {
	if(dmo_get_google_maps_api_key() != ''){
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key='.dmo_get_google_maps_api_key());
  }
}

add_action( 'wp_enqueue_scripts', 'dmo_enqueue_script' );
<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return '';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Add Custom Logo in Login Page.
 */
 function lwc_login_head() {
  
     if ( has_custom_logo() ) :
  
         $image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
         ?>
         <style type="text/css">
             .login h1 a {
                 background-image: url(<?php echo esc_url( $image[0] ); ?>);
                 -webkit-background-size: <?php echo absint( $image[1] )?>px;
                 background-size: <?php echo absint( $image[1] ) ?>px;
                 height: <?php echo absint( $image[2] ) ?>px;
                 width: <?php echo absint( $image[1] ) ?>px;
             }
         </style>
         <?php
     endif;
 }
 add_action( 'login_head', __NAMESPACE__ . '\\lwc_login_head', 100 );



// 1. customize ACF path
function my_acf_settings_path( $path ) {

   // update path
   $path = get_stylesheet_directory() . '/acf/';
   
   // return
   return $path;
   
}
add_filter('acf/settings/path', __NAMESPACE__ . '\\my_acf_settings_path');


// 2. customize ACF dir
function my_acf_settings_dir( $dir ) {

   // update path
   $dir = get_stylesheet_directory_uri() . '/acf/';
   
   // return
   return $dir;
   
}
add_filter('acf/settings/dir', __NAMESPACE__ . '\\my_acf_settings_dir');

// 3. Hide ACF field group menu item
//add_filter('acf/settings/show_admin', '__return_false');

// 4. Include ACF
include_once( get_stylesheet_directory() . '/acf/acf.php' );

/*
 * Pass Date Objet form ACF to Main JavaScript.... 
 */
 
function Get_event_date($localize) {
  // get raw date
  $date = get_field('date_of_the_event', false, false);
  // make date object
  $date = new \DateTime($date);

  $localize['Event_date'] =  $date->format('Y/m/d'); // Date Format 2018/01/01
  return $localize;
}
add_filter('lwc_localize_script', __NAMESPACE__ . '\\Get_event_date'); 

/* 
 * Async load
 */
function lwc_async_scripts($url)
{
  if ( strpos( $url, '#asyncload') === false )
      return $url;
  else if ( is_admin() )
      return str_replace( '#asyncload', '', $url );
  else
	return str_replace( '#asyncload', '', $url )."' async='async"; 
}
add_filter( 'clean_url', __NAMESPACE__ . '\\lwc_async_scripts', 11, 1 );

<?php
/**
 * Bourbon-WP Custom Admin Page
 *
 * @package Bourbon-WP
 */

function sc_add_admin_page(){

  add_menu_page(
    __('Bourbon-WP Options', 'bourbon-wp'),// $page_title
    __('Bourbon-WP', 'bourbon-wp'),        // $menu_title
    'manage_options',                      // $capability
    'sc-custom-admin',                     // $menu_slug
    'sc_create_custom_admin_page',         // $function
    'dashicons-admin-generic',             // $icon
    110                                    // $position
  );
}

add_action( 'admin_menu', 'sc_add_admin_page' );

function sc_create_custom_admin_page(){
  echo '<div class="wrap">';
  echo '<h1>Bourbon-WP Theme Options</h1>';
  echo '</div>';
}

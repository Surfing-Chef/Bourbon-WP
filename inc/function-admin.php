<?php
/**
 * Bourbon-WP Custom Admin Page
 *
 * @package Bourbon-WP
 */

function sc_add_admin_page(){

  // Generate Bourbon-WP Admin Page
  add_menu_page(
    __('Bourbon-WP Options', 'bourbon-wp'),      // $page_title
    __('Bourbon-WP', 'bourbon-wp'),              // $menu_title
    'manage_options',                            // $capability
    'sc_custom_admin',                           // $menu_slug
    'sc_create_custom_admin_page',               // $function
    'dashicons-admin-generic',                   // $icon
    110                                          // $position
  );

  // Generate Bourbon-WP Admin Sub Pages
  add_submenu_page(
    'sc_custom_admin',                           // $parent_slug
    __('Bourbon-WP Options', 'bourbon-wp'),      // $page_title
    __('General', 'bourbon-wp'),                // $menu_title
    'manage_options',                            // $capability
    'sc_custom_admin',                           // $menu_slug
    'sc_create_custom_admin_page'                // $function

  );

  add_submenu_page(
    'sc_custom_admin',                           // $parent_slug
    __('Bourbon-WP API Options', 'bourbon-wp'),  // $page_title
    __('Custom APIs', 'bourbon-wp'),             // $menu_title
    'manage_options',                            // $capability
    'sc_custom_apis',                            // $menu_slug
    'sc_settings_page'                           // $function

  );

  // Crete custom sc_settings_page
  add_action( 'admin_init', 'sc_custom_settings' );
}

add_action( 'admin_menu', 'sc_add_admin_page' );

function sc_custom_settings(){
  register_setting(
    'sc-settings-group',   // $option_group
    'google_api'           // $option_name
  );

  add_settings_section(
    'sc-api-options',      // $id
    'API Options',         // $title
    'sc_api_options',      // $callback
    'sc_custom_admin'      // $page ($id of page to attach section to )
  );

  add_settings_field(
    'google-map-api',      // $id
    'API',                 // $title
    'sc_google_map_api',   // $callback
    'sc_custom_admin',     // $page
    'sc-api-options'       // $section
  );
}

function sc_api_options(){
  echo 'Customize API information.';
}

function sc_google_map_api(){
  $api = esc_attr(get_option( 'google_api' ) );
  echo '<input type="text" name="google_api" value="'. $api .'" placeholder="Google Map API">';
}

// add_menu_page callback : generate Bourbon-WP admin page content
function sc_create_custom_admin_page(){
  require_once(get_template_directory() . '/inc/templates/sc-admin.php');
}

// add_submenu_page callback : generate Bourbon-WP admin subpage content
function sc_settings_page(){
}

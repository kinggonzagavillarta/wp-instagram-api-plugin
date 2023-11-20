<?php

function wpinsta_settings_page_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }
  include( WPINSTA_DIR . 'templates/admin/settings-page.php');
}

function wpinsta_settings_pages()
{
  add_menu_page(
    __( 'Settings', 'wpinsta' ),
    __( 'WPINSTA', 'wpinsta' ),
    'manage_options',
    'wpinsta',
    'wpinsta_settings_page_markup',
    'dashicons-instagram',
    100
  );

}
add_action( 'admin_menu', 'wpinsta_settings_pages' );

// Add a link to your settings page in your plugin
function wpinsta_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=wpinsta">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
  	return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wpinsta_add_settings_link' );
<?php

function wpinsta_settings() {

  // If plugin settings don't exist, then create them
  if( false == get_option( 'wpinsta_settings' ) ) {
      add_option( 'wpinsta_settings' );
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'wpinsta_settings_section',
    // Section Title
    __( 'WPINSTA Page', 'wpinsta' ),
    // Callback for an optional description
    'wpinsta_settings_section_callback',
    // Admin page to add section to
    'wpinsta'
  );

  // Input Text Field
  add_settings_field(
    // Unique identifier for field
    'wpinsta_settings_access_token',
    // Field Title
    __( 'Access Token', 'wpinsta'),
    // Callback for field markup
    'wpinsta_settings_access_token_input_callback',
    // Page to go on
    'wpinsta',
    // Section to go in
    'wpinsta_settings_section'
  );

    // Input Text Field
    add_settings_field(
        // Unique identifier for field
        'wpinsta_settings_userid',
        // Field Title
        __( 'User ID', 'wpinsta'),
        // Callback for field markup
        'wpinsta_settings_userid_input_callback',
        // Page to go on
        'wpinsta',
        // Section to go in
        'wpinsta_settings_section'
    );



  // Dropdown
  add_settings_field(
    'wpinsta_settings_post_limit',
    __( 'Post Limit', 'wpinsta'),
    'wpinsta_settings_post_limit_callback',
    'wpinsta',
    'wpinsta_settings_section',
    // [
    //   'none' => 'none',
    //   '1' => '1',
    //   '2' => '2',
    //   '3' => '3',
    //   '4' => '4',
    //   '5' => '5',
    //   '6' => '6',
    //   '7' => '7',
    //   '8' => '8',
    //   '9' => '9',
    //   '10' => '10',

    // ]
  );

  // Dropdown
  add_settings_field(
    'wpinsta_settings_cache_time',
    __( 'Cache time', 'wpinsta'),
    'wpinsta_settings_cache_time_callback',
    'wpinsta',
    'wpinsta_settings_section',
    [
      'hourly' => 'hourly',
      'twicedaily' => 'twice daily',
      'daily' => 'daily',
      'weekly' => 'weekly',
      'monthly' => 'monthly',
    ]
  );

  register_setting(
    'wpinsta_settings',
    'wpinsta_settings'
  );

}
add_action( 'admin_init', 'wpinsta_settings' );

function wpinsta_settings_section_callback() {

  esc_html_e( 'Instagram Basic Display Settings', 'wpinsta' );

}

function wpinsta_settings_access_token_input_callback() {

  $options = get_option( 'wpinsta_settings' );

	$access_token = '';
	if( isset( $options[ 'access_token' ] ) ) {
		$access_token = esc_html( $options['access_token'] );
	}

  echo '<input type="text" id="wpinsta_access_token" name="wpinsta_settings[access_token]" value="' . $access_token . '" />';

}

function wpinsta_settings_userid_input_callback() {

    $options = get_option( 'wpinsta_settings' );
  
      $user_id = '';
      if( isset( $options[ 'user_id' ] ) ) {
          $user_id = esc_html( $options['user_id'] );
      }
  
    echo '<input type="text" id="wpinsta_user_id" name="wpinsta_settings[user_id]" value="' . $user_id . '" />';
  
  }

function wpinsta_settings_post_limit_callback( $args ) {

  $options = get_option( 'wpinsta_settings' );

  $post_limit = '';
	if( isset( $options[ 'post_limit' ] ) ) {
		$post_limit = esc_html( $options['post_limit'] );
	}


  echo '<input type="number" id="post_limit" name="wpinsta_settings[post_limit]" min="1" max="20" value="' . $post_limit . '">';

  // $html = '<select id="wpinsta_post_limit_options" name="wpinsta_settings[post_limit]">';


	// $html .= '<option value="none"' . selected( $post_limit, 'none', false) . '>' . $args['none'] . '</option>';
	// $html .= '<option value="1"' . selected( $post_limit, '1', false) . '>' . $args['1'] . '</option>';
	// $html .= '<option value="2"' . selected( $post_limit, '2', false) . '>' . $args['2'] . '</option>';
	// $html .= '<option value="3"' . selected( $post_limit, '3', false) . '>' . $args['3'] . '</option>';
	// $html .= '<option value="4"' . selected( $post_limit, '4', false) . '>' . $args['4'] . '</option>';
	// $html .= '<option value="5"' . selected( $post_limit, '5', false) . '>' . $args['5'] . '</option>';
	// $html .= '<option value="6"' . selected( $post_limit, '6', false) . '>' . $args['6'] . '</option>';
	// $html .= '<option value="7"' . selected( $post_limit, '7', false) . '>' . $args['7'] . '</option>';
	// $html .= '<option value="8"' . selected( $post_limit, '8', false) . '>' . $args['8'] . '</option>';
	// $html .= '<option value="9"' . selected( $post_limit, '9', false) . '>' . $args['9'] . '</option>';
	// $html .= '<option value="10"' . selected( $post_limit, '10', false) . '>' . $args['10'] . '</option>';

	// $html .= '</select>';

	// echo $html;

}

function wpinsta_settings_cache_time_callback( $args ){

  $options = get_option( 'wpinsta_settings' );

  $cache_time = '';
	if( isset( $options[ 'cache_time' ] ) ) {
		$cache_time = esc_html( $options['cache_time'] );
	}

  $html = '<select id="wpinsta_cache_time_options" name="wpinsta_settings[cache_time]">';


	$html .= '<option value="hourly"' . selected( $cache_time, 'hourly', false) . '>' . $args['hourly'] . '</option>';
	$html .= '<option value="twicedaily"' . selected( $cache_time, 'twicedaily', false) . '>' . $args['twicedaily'] . '</option>';
	$html .= '<option value="daily"' . selected( $cache_time, 'daily', false) . '>' . $args['daily'] . '</option>';
	$html .= '<option value="weekly"' . selected( $cache_time, 'weekly', false) . '>' . $args['weekly'] . '</option>';
	$html .= '<option value="monthly"' . selected( $cache_time, 'monthly', false) . '>' . $args['monthly'] . '</option>';
	$html .= '</select>';

	echo $html;
}

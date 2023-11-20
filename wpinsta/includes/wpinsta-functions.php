<?php

function wpinsta_request_instagram_posts(){

    if(get_option( 'wpinsta_settings' )) {
        $options = get_option( 'wpinsta_settings' );
        $accessToken = $options['access_token'];
        $userid = $options['user_id'];
        $post_limit = $options['post_limit'];

        if($post_limit == 'none') {
            $post_limit = '';
        }

        $api = "https://graph.instagram.com/v12.0/{$userid}/media?fields=id,username,caption,timestamp,media_url,media_type,permalink&access_token={$accessToken}&limit={$post_limit}";

        $args = [
            'method' => 'GET',
        ];
        
        $response = wp_remote_get( $api, $args);
    
        $results = json_decode( wp_remote_retrieve_body($response));
        
        $data = $results->data;
         
        if( false == get_option( 'wpinsta_api_data' ) ) {
    
            $save = add_option( 'wpinsta_api_data', $data );

            return $save;
        }
    
        else {
    
            $save = update_option('wpinsta_api_data', $data);

            return $save;

        }

    }

    else {
        return;
    }
  
}


add_action('wpinsta_request_cache', 'wpinsta_request_instagram_posts');

if (!wp_next_scheduled('wpinsta_request_cache')) {
    $option = get_option( 'wpinsta_settings' );
    $chache_time = $option['cache_time'];
    wp_schedule_event(time(), $chache_time, 'wpinsta_request_cache');
}


function wpinsta_show_instagram_posts() {
    $wpinsta_api_data = get_option( 'wpinsta_api_data' );
    return $wpinsta_api_data;
}
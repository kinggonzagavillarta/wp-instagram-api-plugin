<div class="wrap">

  <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
  <form method="post" action="options.php">
    
    <!-- Display necessary hidden fields for settings -->
    <?php settings_fields( 'wpinsta_settings' ); ?>
    <!-- Display the settings sections for the page -->
    <?php do_settings_sections( 'wpinsta' ); ?>
    <!-- Default Submit Button -->
    <?php submit_button();
    
    // echo "<pre>";
    // var_dump(wpinsta_show_instagram_posts());
    // echo "</pre>";

    ?>
  <h4>To use data as a function: <i>wpinsta_show_instagram_posts()</i></h4>
  <h4>To use data as a shortcode: <i>[wpinsta_show_instagram_posts]</i></h4>

  </form>

</div>

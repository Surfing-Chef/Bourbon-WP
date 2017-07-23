<div class="wrap">

  <h1>Bourbon-WP Theme Options</h1>
  <?php settings_errors(); ?>
  <form method="post" action="options.php">
    <?php settings_fields( 'sc-settings-group' ); ?>
    <?php do_settings_sections( 'sc_custom_admin' ); // $page defined in add_settings_section ?>
    <?php submit_button(); ?>
  </form>

</div>

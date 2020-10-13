<?php settings_errors(); ?>

<h1>Configuración del widget lateral de la tienda</h1>

<form method="post" action="options.php">

    <?php settings_fields( 'wm_settings_group' ); ?>
    <?php do_settings_sections('wm-settings'); ?>   
    <?php submit_button(); ?>

</form>
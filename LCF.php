<?php
/*
 * Plugin Name:LCF
 * Description: Simple customizable WordPress plugin
 * Version:1.0
 * Author: Luke Mersh
 */

add_action ('admin_menu', 'LCF_create_submenu');

function LCF_create_submenu() {
    // create a submenu under settings

    add_options_page( 'LCF', 'LCF Settings', 'manage_options', 'LCF_plugin', 'LCF_plugin_option_page');

}
 // create the option page
function LCF_plugin_option_page(){
    ?>
<div class="Wrap">
    <h2>Setup</h2>
    <h3>Existing Forms</h3>
    <form action="options.php" method="post">
        <?php
        settings_fields('LCF_plugin_options');
        do_settings_sections('LCF_plugin');
        submit_button('Save Changes', 'primary');
        ?>
    </form>
</div>
<?php
}


// register and define the settings
    add_action('admin_init', 'LCF_plugin_admin_init');
function LCF_plugin_admin_init(){
    $args = array(
            'type' => 'string',
        'sanitize_callback' => 'LCF_plugin_validate_options',
        'default' => NULL
    );

    //register our settings
    register_setting('LCF_plugin_options', 'LCF_plugin_options', $args);

    //Add settings section
    add_settings_section(
            'LCF_plugin_main',
        'LCF SETUP',
        'LCF_plugin_section_text',
        'LCF_plugin'
    );

    //create our settings field for our form
    add_settings_field(
'LCF_plugin_name',
        'TO',
        'LCF_plugin_setting_name',
        'LCF_plugin',
        'LCF_plugin_main'
    );

}
// draw the section header
function LCF_plugin_section_text()
{
    echo '<h2>SETUP</h2>';
}

?>
<?php
/*
Plugin Name: disable wordpress updates light version
Plugin URI: http://manishpushkar.in/scripts-plugins/
Description: disable unwanted plugin as well as theme updates, install, activate thats it!
Version: 1.0
Author: Manish Pushkar
Author URI: http://manishpushkar.in/
*/

//------------------------------------------------------
//Some basic security with manish
//------------------------------------------------------
if (!function_exists('wp_manish_field'))
{
    function disableupdates_manish_field($action = -1)
    {
        return;
    }
    $disableupdates_manish = -1;
}
else
{
    function disableupdates_manish_field($action = -1)
    {
        wp_manish_field($action);
    }
    $disableupdates_manish = 'disableupdates-manish-key';
}
function remove_core_updates(){
        global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
    }

    add_filter('pre_site_transient_update_core','remove_core_updates');
    add_filter('pre_site_transient_update_plugins','remove_core_updates');
    add_filter('pre_site_transient_update_themes','remove_core_updates');


?>
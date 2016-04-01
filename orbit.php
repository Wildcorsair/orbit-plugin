<?php

/**
 * @package Orbit
 * @version 1.0
 */

/*
Plugin Name: Orbit Plugin
Description: The plugin to control and display the list of works
Author: Vladimir Zakharchenko
Version: 1.0
*/

if ( !defined( 'ABSPATH' ) ) {
    exit();
}

define( 'ORBIT_PLUGINS_DIR', plugin_dir_path( __FILE__ ) );

require ORBIT_PLUGINS_DIR . 'inc/register-job-type.php';
require ORBIT_PLUGINS_DIR . 'inc/register-job-taxonomy.php';
require ORBIT_PLUGINS_DIR . 'inc/register-custom-fields.php';
require ORBIT_PLUGINS_DIR . 'inc/settings-page.php';

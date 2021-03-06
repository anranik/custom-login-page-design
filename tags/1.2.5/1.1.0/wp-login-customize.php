<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://anowar.net
 * @since             1.0.0
 * @package           Wp_Login_Customize
 *
 * @wordpress-plugin
 * Plugin Name:       Wp Login Customize
 * Description:       A plugin to customize your login page
 * Version:           1.1.0
 * Author:            Anowar Anik
 * Author URI:        http://anowar.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-login-customize
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-login-customize-activator.php
 */
function activate_wp_login_customize() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-login-customize-activator.php';
	Wp_Login_Customize_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-login-customize-deactivator.php
 */
function deactivate_wp_login_customize() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-login-customize-deactivator.php';
	Wp_Login_Customize_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_login_customize' );
register_deactivation_hook( __FILE__, 'deactivate_wp_login_customize' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-login-customize.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_login_customize() {

	$plugin = new Wp_Login_Customize();
	$plugin->run();

}
run_wp_login_customize();

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/naeem-akhtar-cs/
 * @since             1.0.0
 * @package           Keralalottries
 *
 * @wordpress-plugin
 * Plugin Name:       KeralaLottries
 * Plugin URI:        https://www.linkedin.com/in/naeem-akhtar-cs/
 * Description:       Lottries of Kerala. Short Code: [KeralaLottries]
 * Version:           1.0.0
 * Author:            Naeem Akhtar
 * Author URI:        https://www.linkedin.com/in/naeem-akhtar-cs/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       keralalottries
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'KERALALOTTRIES_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-keralalottries-activator.php
 */
function activate_keralalottries() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-keralalottries-activator.php';
	Keralalottries_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-keralalottries-deactivator.php
 */
function deactivate_keralalottries() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-keralalottries-deactivator.php';
	Keralalottries_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_keralalottries' );
register_deactivation_hook( __FILE__, 'deactivate_keralalottries' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-keralalottries.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_keralalottries() {

	$plugin = new Keralalottries();
	$plugin->run();

}
run_keralalottries();

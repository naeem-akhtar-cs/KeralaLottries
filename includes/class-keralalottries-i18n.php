<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.linkedin.com/in/naeem-akhtar-cs/
 * @since      1.0.0
 *
 * @package    Keralalottries
 * @subpackage Keralalottries/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Keralalottries
 * @subpackage Keralalottries/includes
 * @author     Naeem Akhtar <naeem.akhtar.cs@gmail.com>
 */
class Keralalottries_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'keralalottries',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

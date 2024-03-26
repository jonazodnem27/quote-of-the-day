<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://jonmendoza.com/
 * @since      1.0.0
 *
 * @package    Quote_Of_The_Day
 * @subpackage Quote_Of_The_Day/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Quote_Of_The_Day
 * @subpackage Quote_Of_The_Day/includes
 * @author     Jon Vincent Mendoza <jonazodnem26@gmail.com>
 */
class Quote_Of_The_Day_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'quote-of-the-day',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

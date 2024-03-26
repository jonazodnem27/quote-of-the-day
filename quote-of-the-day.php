<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://jonmendoza.com/
 * @since             1.0.0
 * @package           Quote_Of_The_Day
 *
 * @wordpress-plugin
 * Plugin Name:       Quote of the Day
 * Plugin URI:        https://https://jonmendoza.com/quote-of-the-day
 * Description:       Get a new word daily with our Word of the Day plugin! Enhance your vocabulary effortlessly. Perfect for language lovers and writers. Start your day with a fresh word.
 * Version:           1.0.0
 * Author:            Jon Vincent Mendoza
 * Author URI:        https://https://jonmendoza.com//
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       quote-of-the-day
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
define( 'QUOTE_OF_THE_DAY_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-quote-of-the-day-activator.php
 */
function activate_quote_of_the_day() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quote-of-the-day-activator.php';
	Quote_Of_The_Day_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-quote-of-the-day-deactivator.php
 */
function deactivate_quote_of_the_day() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quote-of-the-day-deactivator.php';
	Quote_Of_The_Day_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_quote_of_the_day' );
register_deactivation_hook( __FILE__, 'deactivate_quote_of_the_day' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-quote-of-the-day.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_quote_of_the_day() {

	$plugin = new Quote_Of_The_Day();
	$plugin->run();

}
run_quote_of_the_day();

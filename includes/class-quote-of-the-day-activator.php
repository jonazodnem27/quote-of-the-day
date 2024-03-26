<?php

/**
 * Fired during plugin activation
 *
 * @link       https://https://jonmendoza.com/
 * @since      1.0.0
 *
 * @package    Quote_Of_The_Day
 * @subpackage Quote_Of_The_Day/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Quote_Of_The_Day
 * @subpackage Quote_Of_The_Day/includes
 * @author     Jon Vincent Mendoza <jonazodnem26@gmail.com>
 */
class Quote_Of_The_Day_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        $option = 'quote-of-the-day';
        $quotes = array(
            array(
                'quote' => "The only way to do great work is to love what you do.",
                'author' => "Steve Jobs"
            ),
            array(
                'quote' => "In the end, it's not the years in your life that count. It's the life in your years.",
                'author' => "Abraham Lincoln"
            ),
            array(
                'quote' => "The greatest glory in living lies not in never falling, but in rising every time we fall.",
                'author' => "Nelson Mandela"
            ),
            array(
                'quote' => "Believe you can and you're halfway there.",
                'author' => "Theodore Roosevelt"
            ),
            array(
                'quote' => "The only limit to our realization of tomorrow will be our doubts of today.",
                'author' => "Franklin D. Roosevelt"
            )
        );

        if(!get_option($option)){
            $serialized_quotes = serialize($quotes);
            update_option($option, $serialized_quotes);
        }
	}

}

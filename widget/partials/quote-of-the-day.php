<?php
namespace QuoteOfTheDay\Widgets;
 
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
 
/**
 * @since 1.1.0
 */
class QuoteOfTheDay extends Widget_Base {
 
  /**
   * Retrieve the widget name.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget name.
   */
  public function get_name() {
    return 'quote-of-the-day';
  }
 
  /**
   * Retrieve the widget title.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget title.
   */
  public function get_title() {
    return __( 'Quote of the Day', 'quote-of-the-day' );
  }
 
  /**
   * Retrieve the widget icon.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return string Widget icon.
   */
  public function get_icon() {
    return 'eicon-blockquote';
  }
 
  /**
   * Retrieve the list of categories the widget belongs to.
   *
   * Used to determine where to display the widget in the editor.
   *
   * Note that currently Elementor supports only one category.
   * When multiple categories passed, Elementor uses the first one.
   *
   * @since 1.1.0
   *
   * @access public
   *
   * @return array Widget categories.
   */
  public function get_categories() {
    return [ 'dynamic-addons' ];
  }
 
  /**
   * Register the widget controls.
   *
   * Adds different input fields to allow the user to change and customize the widget settings.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function _register_controls() {
	    $this->start_controls_section(
	        'section_quote',
	        [
	            'label' => __( 'Quote', 'quote-of-the-day' ),
	            'tab' => \Elementor\Controls_Manager::TAB_STYLE, // Set to TAB_STYLE for style tab
	        ]
	    );

	    $this->add_control(
			'section_quote_font',
			[
				'label' => esc_html__( 'Font Family', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::FONT,
				'default' => "'Open Sans', sans-serif",
				'selectors' => [
					'{{WRAPPER}} .qotd-quote-box__paragraph, {{WRAPPER}} .qotd-quote-box__author' => 'font-family: {{VALUE}}',
				],
			]
		);

	    // Controls for tabs style
	    $this->add_control(
	        'section_quote_text_color',
	        [
	            'label' => __( 'Text Color', 'quote-of-the-day' ),
	            'type' => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
					'{{WRAPPER}} .qotd-quote-box__paragraph, {{WRAPPER}} .qotd-quote-box__author' => 'color: {{VALUE}}',
				],
	        ]
	    );

	    $this->add_control(
	        'section_quote_background_color',
	        [
	            'label' => __( 'Background Color', 'quote-of-the-day' ),
	            'type' => \Elementor\Controls_Manager::COLOR,
	            'selectors' => [
					'{{WRAPPER}} .qotd-quote-box' => 'background: {{VALUE}}',
				],
	        ]
	    );

	    $this->end_controls_section();
  }
 
  /**
   * Render the widget output on the frontend.
   *
   * Written in PHP and used to generate the final HTML.
   *
   * @since 1.1.0
   *
   * @access protected
   */
  protected function render() {
    $settings = $this->get_settings_for_display();

    $this->add_inline_editing_attributes( 'section_quote_text_color', 'none' );
    $this->add_inline_editing_attributes( 'section_quote_background_color', 'none' );
    $this->add_inline_editing_attributes( 'section_quote_font', 'none' );

    if(!$settings['section_quote_text_color']){
      $settings['section_quote_text_color'] = '#000000';
    }

    if(!$settings['section_quote_background_color']){
      $settings['section_quote_background_color'] = '#FFFFFF';
    }

    if(!$settings['section_quote_font']){
      $settings['section_quote_font'] = 'Arial';
    }

    $asset_url = plugins_url( 'quote-of-the-day/widget/assets/' );

	$option = 'quote-of-the-day';
	$quotes = unserialize(get_option($option));
	$random = rand(0,4);
    ?>

    <div class="qotd-quote-box">
    	<img src="<?= $asset_url; ?>/quote.png" class="qotd-quote-box__icon">
    	<img src="<?= $asset_url; ?>/quote.png" class="qotd-quote-box__icon qotd-quote-box__icon_big">
    	<p class="qotd-quote-box__paragraph"><?= $quotes[$random]['quote']; ?></p>
    	<span class="qotd-quote-box__author"><?= $quotes[$random]['author']; ?></span>
    </div>

    <?php 

  }

}
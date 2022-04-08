<?php

/*
  Plugin Name: Word Count Plugin 
	Description: A truly amazing plugin.
	Version: 1.0
	Author: Kaja
*/

class WordCountAndTimePlugin {
	function __construct() {
		add_action('admin_menu', array($this, 'adminPage'));
		add_action('admin_init', array($this, 'settings'));
		add_filter('the_content', array($this, 'ifWrap')); 
	}

	function ifWrap($content) {
		if (is_main_query() AND is_single() AND (get_option('wcp_wordcount', '1') OR get_option('wcp_charactercount', '1') OR get_option('wcp_readtime', '1'))) {
			return $this->createHTML($content);
		}
		return $content;
	}

	function createHTML($content) {
		$html = '<h3>' . get_option('wcp_headline', 'Post Statistics') . '</h3><p>';

		// get word count once because both wordcount and read time will need it
		if (get_option('wcp_wordcount', '1') OR get_option('wcp_readtime', '1')) {
			$wordCount = str_word_count(strip_tags($content)); //strip tags so that tags aren't counted, just the actual words
		}

		if (get_option('wcp_wordcount', '1')) {
			$html .= 'This post has ' . $wordCount . ' words.<br>';
		}

		if (get_option('wcp_charactercount', '1')) {
			$html .= 'This post has ' . strlen(strip_tags($content)). ' characters.<br>';
		}

		if (get_option('wcp_readtime', '1')) {
			$html .= 'This post will take ' . round($wordCount/225) . ' minute(s) to read.<br>';
		}

		$html .= '<p>';

		if (get_option('wcp_location', '0') == '0') {
			return $html . $content;
		}
		return $content . $html;
	}

	function settings() {
		add_settings_section('wcp_first_section', null, null, 'word-count-settings-page');
		
		//Location on the page 
		add_settings_field('wcp_location', 'Display Location', array($this, 'locationHTML'), 'word-count-settings-page', 'wcp_first_section');
		//1st argument - the name of the group this setting belongs to 
		//2nd argument - the name for this specific setting
		//3rd argument - an array of options
		register_setting('wordcountplugin', 'wcp_location', array('sanitize_callback' => array($this, 'sanitizeLocation'), 'default' => '0'));

		//Headline text
		add_settings_field('wcp_headline', 'Headline Text', array($this, 'headlineHTML'), 'word-count-settings-page', 'wcp_first_section');
		register_setting('wordcountplugin', 'wcp_headline', array('sanitize_callback' => 'sanitize_text_field', 'default' => 'Post Statistics'));

		//Word count checkbox
		add_settings_field('wcp_wordcount', 'Word Count', array($this, 'wordcountHTML'), 'word-count-settings-page', 'wcp_first_section');
		register_setting('wordcountplugin', 'wcp_wordcount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));

		//Character count checkbox
		add_settings_field('wcp_charactercount', 'Character Count', array($this, 'charactercountHTML'), 'word-count-settings-page', 'wcp_first_section');
		register_setting('wordcountplugin', 'wcp_charactercount', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));

		//Read time checkbox
		add_settings_field('wcp_readtime', 'Read Time', array($this, 'readtimeHTML'), 'word-count-settings-page', 'wcp_first_section');
		register_setting('wordcountplugin', 'wcp_readtime', array('sanitize_callback' => 'sanitize_text_field', 'default' => '1'));
	}

	//this function prevents malicious users from entering other numbers than 0 or one for input
	function sanitizeLocation($input) {
		if ($input != '0' AND $input != '1') {
			//1st argument - name of tehe option that the error is related to 
			//2nd argument - an identifier for this particular error
			//3rd argument - the message that you want to display to the user
			add_settings_error('wcp_location', 'wcp_location_error', 'Display location must be either beginning or end.');
			return get_option('wcp_location');
		}
		return $input;
	}

	function readtimeHTML() { ?>
		<input type="checkbox" name="wcp_readtime" value="1" <?php checked(get_option('wcp_readtime'), '1') ?>>
	<?php }
	
	function charactercountHTML() { ?>
		<input type="checkbox" name="wcp_charactercount" value="1" <?php checked(get_option('wcp_charactercount'), '1') ?>>
	<?php }

	function wordcountHTML() { ?>
		<input type="checkbox" name="wcp_wordcount" value="1" <?php checked(get_option('wcp_wordcount'), '1') ?>>
	<?php }

	function headlineHTML() { ?>
		<input type="text" name="wcp_headline" value="<?php echo esc_attr(get_option('wcp_headline')) ?>"> 
	<?php }

	function locationHTML() { ?>
		<select name="wcp_location">
			<option value="0" <?php selected(get_option('wcp_location'), '0') ?>>Beginning of post</option>
			<option value="1" <?php selected(get_option('wcp_location'), '1') ?>>End of post</option>
		</select>
	<?php }

	//add_options_page - Add submenu page to the Settings main menu. 
	// 1st argument - the title of the page that we want to create
	// 2nd argument - the title of the page that will be used in the Settings menu
	// 3rd argument - what permissions the user needs to have to see this page
	// 4th argument - slug, must be unique! 
	// 5th argument - function that will output the HTML content onto the new page
	function adminPage() {
		add_options_page('Word Count Settings', 'Word Count', 'manage_options', 'word-count-settings-page', array($this, 'ourHTML'));
	}

	function ourHTML() { ?>
		<div class="wrap">
			<h1>Word Count Settings</h1>
			<form action="options.php" method="POST">
			<?php
				settings_fields('wordcountplugin');
				do_settings_sections('word-count-settings-page');
				submit_button();
			?>
			</form>
		</div>	
	<?php }
}

$wordCountAndTimePlugin = new WordCountAndTimePlugin();

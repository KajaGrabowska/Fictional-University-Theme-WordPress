<?php

/*
  Plugin Name: Word Filter Plugin 
  Description: Replaces a list of words.
	Author: Kaja
*/

if ( ! defined( 'ABSPATH' ) ) exit;	//Exit if accessed directly

class WordFilterPlugin {
	function __construct() {
		add_action('admin_menu', array($this, 'ourMenu'));
	}

	function ourMenu() {
		//1st arg - document title
		//2nd arg - the text that will show up in the admin side bar
		//3rd arg - capability
		//4th arg - slug/short name
		//5th arg - function that outputs the HTML for the actual page itself 
		//6th arg - menu icon
		//7th arg - the number that controls where the menu will appear in the side bar, the bigger the number the lower the position 
		$mainPageHook = add_menu_page('Words To Filter', 'Word Filter', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'), 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZmlsbC1ydWxlPSJldmVub2RkIiBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xMCAyMEMxNS41MjI5IDIwIDIwIDE1LjUyMjkgMjAgMTBDMjAgNC40NzcxNCAxNS41MjI5IDAgMTAgMEM0LjQ3NzE0IDAgMCA0LjQ3NzE0IDAgMTBDMCAxNS41MjI5IDQuNDc3MTQgMjAgMTAgMjBaTTExLjk5IDcuNDQ2NjZMMTAuMDc4MSAxLjU2MjVMOC4xNjYyNiA3LjQ0NjY2SDEuOTc5MjhMNi45ODQ2NSAxMS4wODMzTDUuMDcyNzUgMTYuOTY3NEwxMC4wNzgxIDEzLjMzMDhMMTUuMDgzNSAxNi45Njc0TDEzLjE3MTYgMTEuMDgzM0wxOC4xNzcgNy40NDY2NkgxMS45OVoiIGZpbGw9IiNGRkRGOEQiLz4KPC9zdmc+Cg==', 100);
		//1st arg - menu you want to add the subpage to (slug/short name)
		//2nd arg - document title
		//3rd arg - the text you'll see in the admin side bar 
		//4th arg - capability
		//5th arg - slug name
		//6th arg - functions that outputs the HTML for the page 
		add_submenu_page('ourwordfilter', 'Words To Filter', 'Words List', 'manage_options', 'ourwordfilter', array($this, 'wordFilterPage'));
		add_submenu_page('ourwordfilter', 'Word Filter Options', 'Options', 'manage_options', 'word-filter-options', array($this, 'optionsSubPage'));
		add_action("load-{$mainPageHook}", array($this, 'mainPageAssets'));
	}

	function mainPageAssets() {
		wp_enqueue_style('filterAdminCss', plugin_dir_url(__FILE__) . 'styles.css');
	}

	function wordFilterPage() { ?>
		<div class="wrap">
			<h1>Word Filter</h1>
			<form method="POST">
				<label for="plugin_words_to_filter"><p>Enter a <strong>comma-separated</strong> list of words to filter from your site's content.</p></label>
				<div class="word-filter__flex-container">
					<textarea name="plugin_words_to_filter" id="plugin_words_to_filter" placeholder="bad, mean, awful, horrible"></textarea>
				</div>
				<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
			</form>
		</div>
	<?php }

	function optionsSubPage() { ?>
		Hello world from the options page. 
	<?php }
}

$wordFilterPlugin = new WordFilterPlugin();
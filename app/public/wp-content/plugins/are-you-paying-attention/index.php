<?php

/*
  Plugin Name: Are You Paying Attention Quiz
  Description: Give your readers a multiple choice question.
  Version: 1.0
  Author: Kaja
*/

//prevents people from triggering our code by visiting the url for this php file. 
if ( ! defined( 'ABSPATH' ) ) exit; 

class AreYouPayingAttention {
  function __construct() {
    add_action('init', array($this, 'adminAssets'));
  }

  function adminAssets() {
    // wp_enqueue_script functions enqueues a javascript file
    // it takes 3 arguments
    // - 1st argument is the name we're giving to that JS file so that WordPress can identify it
    // -2nd argument is the URL that points to our JS file
    // -3rd argument is the list of dependencies
    wp_register_style('quizeditcss', plugin_dir_url(__FILE__) . 'build/index.css');
    wp_register_script('ournewblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element', 'wp-editor'));
    //register_block_type takes 2 arguments
    // 1st argument: namespace/block type name
    // 2nd argument: an array of options
          //editor_script -> tells wordpress which JS file to load 
          //render_callback -> responsible for returing HTML to the front-end
      
    register_block_type('ourplugin/are-you-paying-attention', array(
      'editor_script' => 'ournewblocktype',
      'editor_style' => 'quizeditcss',
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes) {
    if (!is_admin()) {
      wp_enqueue_script('attentionFrontend', plugin_dir_url(__FILE__) . 'build/frontend.js', array('wp-element'));
      wp_enqueue_style('attentionFrontendStyles', plugin_dir_url(__FILE__) . 'build/frontend.css');
    }
    
    //anything that comes after ob_start and before ob_get_clean is going to get returned in the function
    ob_start(); ?>
    <div class="paying-attention-update-me"></div>
    <?php return ob_get_clean();
  }

}

$areYouPayingAttention = new AreYouPayingAttention();
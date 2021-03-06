<?php

/*
  Plugin Name: Featured Professor Block Type
  Version: 1.0
  Author: Kaja
  Text Domain: featured-professor
  Domain Path: /languages

*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//imports the php file from inc folder
require_once plugin_dir_path(__FILE__) . 'inc/generateProfessorHTML.php';
require_once plugin_dir_path(__FILE__) . 'inc/relatedPostsHTML.php';

class FeaturedProfessor {
  function __construct() {
    add_action('init', [$this, 'onInit']);
    add_action('rest_api_init', [$this, 'profHTML']);
    add_filter('the_content', [$this, 'addRelatedPosts']);
  }

  function addRelatedPosts($content) {
    if (is_singular('professor') && in_the_loop() && is_main_query()) {
      return $content . relatedPostsHTML(get_the_id());
    }
    return $content;
  }

  // 1st argument - namespace and version portion of the url
  // 2nd argument - specific name for this route
  // 3rd argument - array of options
  function profHTML() {
    register_rest_route('featuredProfessor/v1', 'getHTML', array(
      'methods' => WP_REST_SERVER::READABLE, //-> you can only send a GET request to this endpoint
      'callback' => [$this, 'getProfHTML'] //function that will run when someone visits the endpoint
    ));
  }

  function getProfHTML($data) {
    return generateProfessorHTML($data['profId']);
  }

  function onInit() {
    //makes the plugin support translations
    load_plugin_textdomain( 'featured-professor', false, dirname(plugin_basename(__FILE__)) . '/languages');

    //1st argument - type of metadata
    //2nd argument - name for the meta
    //3rd argument - an array of options 
    register_meta('post', 'featuredprofessor', array(
      'show_in_rest' => true,
      'type' => 'number',
      'single' => false
    ));

    wp_register_script('featuredProfessorScript', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-i18n', 'wp-editor'));
    wp_register_style('featuredProfessorStyle', plugin_dir_url(__FILE__) . 'build/index.css');

    wp_set_script_translations('featuredProfessorScript', 'featured-professor', plugin_dir_path(__FILE__) . '/languages');

    register_block_type('ourplugin/featured-professor', array(
      'render_callback' => [$this, 'renderCallback'],
      'editor_script' => 'featuredProfessorScript',
      'editor_style' => 'featuredProfessorStyle'
    ));
  }

  function renderCallback($attributes) {
    if ($attributes['profId']) {
      wp_enqueue_style('featuredProfessorStyle');
      return generateProfessorHTML($attributes['profId']);
    } else {
      return NULL;
    }
  }

}

$featuredProfessor = new FeaturedProfessor();
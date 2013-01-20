<?php
/*
Plugin Name: NextGEN Flex Slider Template
Plugin URI: http://wpdevsnippets.com/nextgen-flex-image-content-slider-template/
Description: Add a "sliderview" template for the NextGen gallery. Use the shortcode [nggallery id=x template="sliderview"] to display images as the slider.
Author: Mohsin Rasool
Author URI: http://mohsinrasool.wordpress.com
Version: 1.2
*/

include 'admin-settings.php';

if (!class_exists('nggSliderview')) {
    class nggSliderview {
        var $plugin_name = null; 
        function nggSliderview() {
            $this->plugin_name = '/'.plugin_basename( dirname(__FILE__) ).'/';
            add_action('wp_enqueue_scripts', array(&$this, 'load_scripts') );
            add_action('wp_enqueue_scripts', array(&$this, 'load_styles') );
            add_filter('ngg_render_template', array(&$this, 'add_template'), 10, 2);
        }

        function add_template( $path, $template_name = false) {

            if ($template_name == 'gallery-sliderview') {
                $path = WP_PLUGIN_DIR.$this->plugin_name.'/template-nggsliderview.php';
            }

            return $path;
        }

        function load_styles() {
            if(get_option('ng_slider_theme'))
                wp_enqueue_style('nggsliderview-bluecss', plugins_url($this->plugin_name.'css/blue1.css'), false, '1.0.1', 'screen');
            else
                wp_enqueue_style('nggsliderview-css', plugins_url($this->plugin_name.'css/black.css'), false, '1.0.1', 'screen');
        }

        function load_scripts() {
            wp_enqueue_script('nggsliderview', plugins_url($this->plugin_name.'js/jquery.flexslider-min.js'), array('jquery'), '1.2');			
        }

    }

    // Start this plugin once all other plugins are fully loaded
    add_action( 'plugins_loaded', create_function( '', 'global $nggSliderview; $nggSliderview = new nggSliderview();' ) );

}
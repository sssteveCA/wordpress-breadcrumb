<?php

/**
 * Plugin Name: Custom Breadcrumb
 * Plugin URI: https://custombreadcrumb.com/custom_breadcrumb
 * Version: 1.0
 * Description: Set a breadcrumb for your Wordpress site pages to improve the user navigation experience
 * Author: Stefano Puggioni
 * Requires PHP: 8.0
 * Requires at least: 5.2
 * Text Domain: custom-breadcrumb
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

use Breadcrumb\Classes\BreadcrumbContainer;
use Breadcrumb\Classes\HooksClass;

require_once "classes/breadcrumbcontainer.php";
require_once "classes/breadcrumbitem.php";
require_once "classes/hooksclass.php";

/* add_action('the_post', function(WP_Post $post, WP_Query $query){
    return HooksClass::cb_show_breadcrumb($post,$query);
},11,2); */

add_action('wp_enqueue_scripts','cb_scripts');
function cb_scripts(){
    $plugin_url = plugin_dir_url(__FILE__);
    wp_enqueue_style('cb_breadcrumb_css',$plugin_url.'css/breadcrumb.css',[],null);
    wp_enqueue_script('cb_breadcrumb_js',$plugin_url.'js/breadcrumb.js',[],null,true);
}

add_filter('script_loader_tag','cb_js_tags',10,3);
function cb_js_tags(string $tag, string $handle, string $src){
    if($handle == 'cb_breadcrumb_js'){
        $tag = '<script type="module" src="'.esc_url($src).'" defer></script>';
    }
    return $tag;
}

/* add_action('all','cb_debug_all');
function cb_debug_all(){
    file_put_contents("log.txt",current_action()."\r\n",FILE_APPEND);
} */
?>
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

use Breadcrumb\Interfaces\Constants as C;
use Breadcrumb\Classes\BreadcrumbContainer;
use Breadcrumb\Classes\HooksClass;

require_once "interfaces/constants.php";
require_once "classes/breadcrumbcontainer.php";
require_once "classes/breadcrumbitem.php";
require_once "classes/hooksclass.php";

/* add_action('the_post', function(WP_Post $post, WP_Query $query){
    return HooksClass::cb_show_breadcrumb($post,$query);
},11,2); */

add_action('wp_enqueue_scripts','cb_scripts');
function cb_scripts(){
    global $post;
    $plugin_url = plugin_dir_url(__FILE__);
    wp_enqueue_style(C::BREADCRUMB_H_CSS,$plugin_url.C::BREADCRUMB_PATH_CSS,[],null);
    wp_enqueue_script(C::BREADCRUMB_H_JS,$plugin_url.C::BREADCRUMB_PATH_JS,[],null,true);
    wp_localize_script(C::BREADCRUMB_H_JS,'breadcrumb_vars',[
        'post_id' => $post->ID, 'home' => is_home(), 'front' => is_front_page(), 'category' => is_category()
    ]);
    do_action('cb_enqueue_scripts');
}

add_filter('script_loader_tag','cb_js_tags',10,3);
function cb_js_tags(string $tag, string $handle, string $src){
    if($handle == C::BREADCRUMB_H_JS){
        $tag = '<script type="module" src="'.esc_url($src).'" defer></script>';
    }
    return $tag;
}

/* add_action('all','cb_debug_all');
function cb_debug_all(){
    file_put_contents("log.txt",current_action()."\r\n",FILE_APPEND);
} */

add_action('cb_enqueue_scripts','cb_custom_scripts');
function cb_custom_scripts(){
    file_put_contents("log.txt","cb_enqueue_scripts\r\n",FILE_APPEND);
}

add_filter('cb_nav_atts_filter','cb_nav_atts');
function cb_nav_atts(array $atts){
    file_put_contents("log.txt","cb_nav_atts\r\n",FILE_APPEND);
    file_put_contents("log.txt","array => ".var_export($atts,true)."\r\n",FILE_APPEND);
}

add_filter('cb_ul_atts_filter','cb_ul_atts');
function cb_ul_atts(array $atts){
    file_put_contents("log.txt","cb_ul_atts\r\n",FILE_APPEND);
    file_put_contents("log.txt","array => ".var_export($atts,true)."\r\n",FILE_APPEND);
}

add_filter('cb_li_atts_filter','cb_li_atts');
function cb_li_atts(array $atts){
    file_put_contents("log.txt","cb_li_atts\r\n",FILE_APPEND);
    file_put_contents("log.txt","array => ".var_export($atts,true)."\r\n",FILE_APPEND);
}

?>
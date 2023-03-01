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

require_once "interfaces/constants.php";

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

?>
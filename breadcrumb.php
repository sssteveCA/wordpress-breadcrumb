<?php

/**
 * Plugin Name: Custom Breadcrumb
 * Version: 0.1
 * Description: Set a breadcrumb for your Wordpress site pages to improve the user navigation experience
 * Author: Stefano Puggioni
 * Requires PHP: 8.0
 * Requires at least: 5.2
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

use Breadcrumb\Classes\BreadcrumbItem;

require_once "classes/breadcrumbitem.php";

add_action('wp_head','br_show_breadcrumb',11);
function br_show_breadcrumb(){
    global $post;
    file_put_contents("log.txt","POST => ".var_export($post->to_array(),true)."\r\n",FILE_APPEND);
    $britem = new BreadcrumbItem($post);

}
?>
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
use Breadcrumb\Classes\BreadcrumbItem;

require_once "classes/breadcrumbcontainer.php";
require_once "classes/breadcrumbitem.php";

add_action('wp_head','cb_show_breadcrumb',11);
function cb_show_breadcrumb(){
    global $post;
    $britem = new BreadcrumbContainer($post);
}
?>
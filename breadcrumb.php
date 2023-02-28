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

require_once "classes/breadcrumbcontainer.php";
require_once "classes/breadcrumbitem.php";

add_filter('the_title','cb_show_breadcrumb',11,2);
function cb_show_breadcrumb(string $post_title, int $post_id){
    global $post;
    $br_container = new BreadcrumbContainer($post);
    return $br_container->getHtml().$post_title;
}
?>
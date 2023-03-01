<?php

namespace Breadcrumb\Classes;

use WP_Post;

class HooksClass{

    /**
     * Create the breadcrumb of the current displayed post
     * @param WP_Post $post the current post displayed
     * @return string The breadcrumb HTML
     */
    public static function cb_show_breadcrumb(WP_Post $post): string{
        $breadcrumb = "";
        if(!is_home() && !is_front_page() && !is_category()){
            $br_container = new BreadcrumbContainer($post);
            $breadcrumb = $br_container->getHtml();
        }
        return $breadcrumb;
    }
}
?>
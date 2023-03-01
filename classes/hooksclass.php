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
        $br_container = new BreadcrumbContainer($post);
        return $br_container->getHtml();
    }
}
?>
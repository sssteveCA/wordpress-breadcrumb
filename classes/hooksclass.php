<?php

namespace Breadcrumb\Classes;

use WP_Post;

class HooksClass{

    public static function cb_show_breadcrumb(WP_Post $post){
        $breadcrumb = "";
        if(!is_home() && !is_front_page() && !is_category()){
            $br_container = new BreadcrumbContainer($post);
            $breadcrumb = $br_container->getHtml();
        }
        return $breadcrumb;
    }
}
?>
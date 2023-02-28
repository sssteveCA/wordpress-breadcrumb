<?php

namespace Breadcrumb\Classes;

class HooksClass{

    public static function cb_show_breadcrumb(string $post_title, int $post_id){
        if(!is_home() && !is_front_page()){
            global $post;
            $br_container = new BreadcrumbContainer($post);
            $post_title = $br_container->getHtml().$post_title;
        }
        return $post_title;
    }
}
?>
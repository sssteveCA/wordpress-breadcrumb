<?php

namespace Breadcrumb\Classes;

use WP_Post;
use WP_Query;

class HooksClass{

    public static function cb_show_breadcrumb(WP_Post $post, WP_Query $query){
        if(!is_home() && !is_front_page()){
            $br_container = new BreadcrumbContainer($post);
            $post->post_title =  $br_container->getHtml().$post->post_title;
        }
    }
}
?>
<?php

namespace Breadcrumb\Classes;

class HooksClass{

    public static function cb_show_breadcrumb(){
        if(!is_home() && !is_front_page()){
            global $post;
            $br_container = new BreadcrumbContainer($post);
            return $br_container->getHtml();
        }
        
    }
}
?>
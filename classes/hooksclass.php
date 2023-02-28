<?php

namespace Breadcrumb\Classes;

class HooksClass{

    public static function cb_show_breadcrumb(){
        global $post;
        $br_container = new BreadcrumbContainer($post);
        return $br_container->getHtml();
    }
}
?>
<?php

namespace Breadcrumb\Classes;

use WP_Post;

class BreadcrumbItem{

    private WP_Post $post;


    public function __construct()
    {
        
    }

    public function getPost(){return $this->post;}
}
?>
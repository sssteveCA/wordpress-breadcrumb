<?php

namespace Breadcrumb\Classes;

use WP_Post;

class BreadcrumbItem{

    private WP_Post $post;


    public function __construct(WP_Post $post)
    {
        $this->post = $post;
    }

    public function getPost(){return $this->post;}
}
?>
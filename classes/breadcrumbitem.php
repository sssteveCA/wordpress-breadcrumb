<?php

namespace Breadcrumb\Classes;

use WP_Error;
use WP_Post;

class BreadcrumbItem{

    private array $categories = [];
    private string $html_breadcrumb = "";
    private WP_Post $post;
    private int $errno = 0;
    private ?string $error = null;

    public function __construct(WP_Post $post)
    {
        $this->post = $post;
    }

    public function getCategories(){return $this->categories;}
    public function getHtmlBreadcrumb(){return $this->post;}
    public function getPost(){return $this->post;}
    public function getErrno(){return $this->errno;}
    public function getError(){
        switch($this->errno){
            default:
                $this->error = null;
                break;
        }
    }

    private function createBreadcrumb(){

        $this->html_breadcrumb = <<<HTML
<ul class="br_custom_breadcrumb">
</ul>
HTML;
    }
}
?>
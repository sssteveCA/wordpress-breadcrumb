<?php

namespace Breadcrumb\Classes;

use WP_Error;
use WP_Post;
use WP_Term;

class BreadcrumbContainer{

    private array $elements = [];
    private string $html = "";
    private WP_Post $post;
    private int $errno = 0;
    private ?string $error = null;

    public function __construct(WP_Post $post)
    {
        file_put_contents("log.txt","POST => ".var_export($post->to_array(),true)."\r\n",FILE_APPEND);
        $this->post = $post;
        $this->createBreadcrumb();
    }

    public function getElements(){return $this->elements;}
    public function getHtml(){return $this->html;}
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
        $categories = wp_get_post_categories($this->post->ID,['fields' => 'all']);
        if(!$categories instanceof WP_Error){
            file_put_contents("log.txt","Categories => ".var_export($categories,true)."\r\n",FILE_APPEND);
        $this->html = <<<HTML
<ul class="br_custom_breadcrumb">
HTML;
            foreach($categories as $category){
            }
        $this->html .= <<<HTML
</ul>
HTML;
        }  
    }

    private function setElements(array $categories){
        foreach($categories as $category){
            $breadcrumbitem = new BreadcrumbItem($category);
        }
    }
}
?>
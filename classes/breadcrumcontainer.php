<?php

namespace Breadcrumb\Classes;

use WP_Error;
use WP_Post;
use WP_Term;

class BreadcrumbContainer{

    private array $categories = [];
    private string $html_breadcrumb = "";
    private WP_Post $post;
    private int $errno = 0;
    private ?string $error = null;

    public function __construct(WP_Post $post)
    {
        file_put_contents("log.txt","POST => ".var_export($post->to_array(),true)."\r\n",FILE_APPEND);
        $this->post = $post;
        $this->createBreadcrumb();
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
        $categories = wp_get_post_categories($this->post->ID,['fields' => 'all']);
        if(!$categories instanceof WP_Error){
           $this->categories = $categories;
            file_put_contents("log.txt","Categories => ".var_export($categories,true)."\r\n",FILE_APPEND);
        $this->html_breadcrumb = <<<HTML
<ul class="br_custom_breadcrumb">
HTML;
            foreach($this->categories as $category){
                $this->getCategoryLink($category);
            }
        $this->html_breadcrumb .= <<<HTML
</ul>
HTML;
        }  
    }

    private function getCategoryLink(WP_Term $term): string{
        $category_url = get_category_link($term->term_id);
        file_put_contents("log.txt","Category URL => ".var_export($category_url,true)."\r\n",FILE_APPEND);
        return "";
    }
}
?>
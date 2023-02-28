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
        $this->setElements();
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
        $this->html = <<<HTML
<nav class="cb_nav">
    <ul class="cb_ul_breadcrumb">
HTML;
        foreach($this->elements as $element){
            $this->html .= $element->getHtml();
        }
        $this->html .= <<<HTML
    </ul>
</nav>
HTML;
        file_put_contents("log.txt","BREADCRUMB => ".var_export($this->html,true)."\r\n",FILE_APPEND);
    }

    private function setElements(){
        $this->elements[] = new BreadcrumbItem(['name' => 'Home', 'url' => get_home_url()]);
        $categories = wp_get_post_categories($this->post->ID,['fields' => 'all']);
        if(!$categories instanceof WP_Error){
            foreach($categories as $category_term){
                $category = $category_term->to_array();
                file_put_contents("log.txt","BreadcrumbContainer setElements category => ".var_export($category,true)."\r\n",FILE_APPEND);
                $this->elements[] = new BreadcrumbItem([
                    'id' => $category['term_id'], 'name' => $category['name']
                ]);
            }
        }
        $this->elements[] = new BreadcrumbItem([
            'active' => true, 'name' => $this->post->post_title
        ]);
    }
}
?>
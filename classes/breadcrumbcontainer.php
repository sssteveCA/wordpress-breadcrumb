<?php

namespace Breadcrumb\Classes;

use Breadcrumb\Traits\BreadcrumbGeneral;
use WP_Error;
use WP_Post;

class BreadcrumbContainer{

    use BreadcrumbGeneral;

    private array $elements = [];
    private string $html = "";
    private WP_Post $post;
    private int $errno = 0;
    private ?string $error = null;

    public function __construct(WP_Post $post)
    {
        //file_put_contents("log.txt","POST => ".var_export($post->to_array(),true)."\r\n",FILE_APPEND);
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

    /**
     * Generate the breadcrumb
     */
    private function createBreadcrumb(){
        $nav_atts = [ 'class' => 'cb_nav' ];
        $nav_atts = apply_filters('cb_nav_atts_filter',$nav_atts);
        $nav_atts_string = $this->createAttributesString($nav_atts);
        $ul_atts = [ 'class' => 'cb_ul_breadcrumb' ];
        $ul_atts = apply_filters('cb_ul_atts_filter',$ul_atts);
        $ul_atts_string = $this->createAttributesString($ul_atts);
        $this->html = <<<HTML
<nav {$nav_atts_string}>
    <ul {$ul_atts_string}>
HTML;
        foreach($this->elements as $key => $element){
            $this->html .= $element->getHtml();
            if($key != array_key_last($this->elements)) $this->html .= '<li>&gt;</li>';
        }
        $this->html .= <<<HTML
    </ul>
</nav>
HTML;
        //file_put_contents("log.txt","BREADCRUMB => ".var_export($this->html,true)."\r\n",FILE_APPEND);
    }

    /**
     * Set the data before creating the breadcrumb
     */
    private function setElements(){
        $this->elements[] = new BreadcrumbItem(['name' => 'Home', 'url' => get_home_url()]);
        $categories = wp_get_post_categories($this->post->ID,['fields' => 'all']);
        if(!$categories instanceof WP_Error){
            foreach($categories as $category_term){
                $category = $category_term->to_array();
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
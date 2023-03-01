<?php

namespace Breadcrumb\Classes;

class BreadcrumbItem{

    private bool $active;
    private string $id;
    private string $name;
    private string $url;
    private string $html = "";

    public function __construct(array $params)
    {
        $this->setItemInfo($params);
        $this->setHtml();
    }

    public function getId(){return $this->id;}
    public function getHtml(){return $this->html;}
    public function getName(){return $this->name;}
    public function getUrl(){return $this->url;}
    public function isActive(){return $this->active;}

    /**
     * Set the data for each <li> item
     * @param array $params
     */
    private function setItemInfo(array $params){
        $this->active = isset($params['active']) ? $params['active'] : false;
        $this->id = isset($params['id']) ? $params['id'] : '';
        $this->name = isset($params['name']) ? $params['name'] : '';
        if(!$this->active){
            if($this->id != ''){
                $this->url = get_category_link($this->id);
            }
            else $this->url = isset($params['url']) ? $params['url'] : '';
        }  
    }

    /**
     * Generate the single <li> item
     */
    private function setHtml(){
        $li_atts = [ 'class' => 'cb_breadcrumb_item' ];
        $li_atts = apply_filters('cb_li_atts_filter',$li_atts);
        if(!$this->active){
            if($this->url != ''){
                $this->html = <<<HTML
<li class="{$li_atts['classes']}">
    <a href="{$this->url}">{$this->name}</a>
</li>
HTML; 
            }
        }//if(!$this->active){
        else{
            $this->html = <<<HTML
<li class="{$li_atts['class']}">{$this->name}</li>
HTML;
        }
    }
}
?>
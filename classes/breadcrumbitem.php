<?php

namespace Breadcrumb\Classes;

use WP_Error;
use WP_Term;

class BreadcrumbItem{

    private int $id;
    private string $name;
    private string $url;

    public function __construct(array $params)
    {
        $this->setItemInfo($params);
    }

    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getUrl(){return $this->url;}

    private function setItemInfo(array $params){
        $this->id = isset($params['id']) ? $params['id'] : '';
        $this->name = isset($params['name']) ? $params['name'] : '';
        if($this->id != ''){
            $url = get_category_link($this->id);
            $this->url = (!$url instanceof WP_Error) ? $url : '';
        }
        else
            $this->url = isset($params['url']) ? $params['url'] : '';
    }
}
?>
<?php

namespace Breadcrumb\Classes;

use WP_Term;

class BreadcrumbItem{

    private array $item_info = [
        'name' => '', 'url' => ''
    ];

    public function __construct(array $term)
    {
        $this->setItemInfo($term);
    }

    public function getItemInfo(){return $this->item_info;}

    private function setItemInfo(array $term){
        $this->item_info['name'] = $term['name'];
        if(isset($term['term_id']))
            $this->item_info['url'] = get_category_link($term['term_id']);
        else if(isset($term['url']))
            $this->item_info['url'] = $term['url'];
    }
}
?>
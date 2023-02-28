<?php

namespace Breadcrumb\Classes;

use WP_Term;

class BreadcrumbItem{

    private array $item_info = [
        'name' => '', 'url' => ''
    ];

    public function __construct(WP_Term $term)
    {
        $this->setItemInfo($term);
    }

    public function getItemInfo(){return $this->item_info;}

    private function setItemInfo(WP_Term $term){
        $category_url = get_category_link($term->term_id);
        $this->item_info = [
            'name' => $term->name, 'url' => $category_url
        ];
    }
}
?>
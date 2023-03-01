<?php

namespace Breadcrumb\Traits;

trait BreadcrumbGeneral{

    /**
     * Create the attributes part of an HTML element
     */
    private function createAttributesString(array $atts): string{
        $string_atts = "";
        foreach($atts as $att_name => $att_value){
            $string_atts .= "{$att_name}=\"{$att_value}\"";
            if($att_name != array_key_last($atts)) $string_atts .= " ";
        }
        return $string_atts;
    }

}
?>
<?php

use Breadcrumb\Classes\HooksClass;

require_once "../../../../wp-load.php";
require_once "../traits/breadcrumbgeneral.php";
require_once "../classes/breadcrumbcontainer.php";
require_once "../classes/breadcrumbitem.php";
require_once "../classes/hooksclass.php";

$response = "";
if(isset($_GET['post_id'])){
    $post = get_post($_GET['post_id']);
    if($post instanceof WP_Post){
        $response = HooksClass::cb_show_breadcrumb($post);
    }
}//if(isset($_GET['post_id'])){
echo $response;

?>
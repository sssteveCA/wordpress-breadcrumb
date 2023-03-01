<?php

use Breadcrumb\Classes\HooksClass;

require_once "../../../../wp-load.php";
require_once "../classes/breadcrumbcontainer.php";
require_once "../classes/breadcrumbitem.php";
require_once "../classes/hooksclass.php";

$post = get_post();
file_put_contents("log.txt", "getbreadcrumb.php post => ".var_export($post,true)."\r\n",FILE_APPEND);
if($post instanceof WP_Post){
    echo HooksClass::cb_show_breadcrumb($post);
}
else echo "";

?>
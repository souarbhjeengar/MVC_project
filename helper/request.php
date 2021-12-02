<?php
function request(){
    $requestobj=(object)['controller'=>'categoriesController','method'=>'index'];
    $url=$_GET['url']??'';
    if($url){
        $url=rtrim($url,'/');
        $url=explode('/',$url);
        $requestobj->controller=ucfirst(strtolower($url[0]))."controller";
$requestobj->method=$url[1]??$requestobj->method;
    }
}
?>
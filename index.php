<?php
spl_autoload_register(function ($clsname){
    $path="apps/libs/$clsname.php";
    if(file_exists($path)){
        include_once $path;
    }
})
?>
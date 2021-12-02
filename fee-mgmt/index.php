<?php 
include_once "config/env.php";
include_once "helper/request.php";
include_once "app/Libs/Session.php";
spl_autoload_register(function($clname){
    //echo $clname;
   if(file_exists("app/Libs/$clname.php")){
        require_once("app/Libs/$clname.php");
   }
});
new Autoload();
?>


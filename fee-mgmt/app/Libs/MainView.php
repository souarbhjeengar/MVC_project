<?php
class MainView{
    function loadView($viewname,$peras=[],$hf=1){
        $viewname=str_replace('.','/',$viewname);
         $path="app/Views/$viewname.php";
        if(file_exists($path)){
            extract($peras);
            if($hf){
                include_once "app/views/design/header.php";
            }
            include_once $path;
            if($hf){
                include_once "app/views/design/footer.php";
            }
        }else{
            echo "404 - View Not found.";
        }
     }
}
?>
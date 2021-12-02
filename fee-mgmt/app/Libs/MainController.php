<?php 
class MainController{
    public $view;
    function __construct()
    {
            // echo "<br> Main controller ka constructor call ho raha he<br>";
            $this->view=new MainView();
    }
    function loadModel($modelname,$ob=''){
        if($ob==''){
            $ob=strtolower($modelname);
        }
        $modelname=ucfirst(strtolower($modelname));
        $path= "app/Models/$modelname.php";
        if(file_exists($path)){
            include_once $path;
            $this->$ob=new $modelname();
        }
    }
}
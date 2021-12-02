<?php
class MainView{
    public function loadview($viewname)
    {
        $viewname=str_replace('.','/',$viewname);
        $path="apps/views/$viewname.php";
        if (file_exists($path)){
            include $path;
        }
    }
}
?>
<?php
class Autoload
{
    public function __construct()
    {
        Session::init();
        if (isset($_GET['url'])) {
            $url = explode('/', rtrim($_GET['url'], '/'));
            $controllname = ucfirst(strtolower($url[0])) . 'Controller';
            $methodname = strtolower($url[1] ?? 'index');
            $pera = $url[2] ?? '';
        }
       
        if(Session::get('logininfo') ){
            if(isset($controllname) && $controllname=='LoginController' && $methodname=='login'){
                $controllname = 'StudentController';
                $methodname =  'index';
            }else{
                $controllname = $controllname ??  'StudentController';
                $methodname =  $methodname ?? 'index';
            }
        }else{
            $controllname = 'LoginController';
            $methodname =  'login';
        }
        $pera = $pera ?? '';
        $path = "app/Controllers/$controllname.php";
        if (file_exists($path)) {
            include_once $path;
            $ob = new $controllname();
            if (method_exists($ob, $methodname)) {
                $ob->$methodname($pera);
            } else {
                echo "Method not exist";
            }
        } else {
            echo "404 File Not exist";
        }
    }
}

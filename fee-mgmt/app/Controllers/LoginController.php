<?php
class LoginController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Login');
    }
    public function login(){
        $valid=1;
        $error='<ul>';
        if(request('username')){
            if(!preg_match('/^[A-z]{3,50}$/',request('username'))){
               $error.='<li>Enter valid formate username!</li>';
                $valid=0;
            }
            if(!trim(request('password'))){
               $error.= '<li>Enter Password!</li>';
                $valid=0;
            }
            if($valid){
                if($info=$this->login->validate()){
                    Session::set('logininfo',$info);
                    aredirect('student');
                }else{
                    $error.= '<li>Please Enter Valid Username Or Password!</li>';
                $valid=0;
                }
            }
            $error.="</ul>";
            if(!$valid){
                Session::set('emsg',$error);
            }
        }
            
        $this->view->loadView('login/login');
    } 
    public function logout(){
        Session::destroy();
        aredirect('login/login');
    }
}
?>
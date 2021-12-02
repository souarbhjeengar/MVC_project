<?php
class Login extends MainModel{
    public function validate(){
        //17e0d99c495d22d0f8c3604fa201310f
        $username= addslashes(request('username'));
        $password=md5(addslashes(request('password')));
        $sql="select * from $this->table where username='$username'";
       //echo $sql;
        if($info=$this->exeQuery($sql)){
            if($info['password']==$password){
                return $info;
            }
        }
        return false;
    }
}
?>
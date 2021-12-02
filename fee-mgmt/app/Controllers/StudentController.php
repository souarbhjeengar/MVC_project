<?php
class StudentController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Student','sobj');
        $this->loadModel('Courses','cob');

    }
    public function index()
    {
       $data= $this->sobj->exeQuery('select 
       student.id as id,courses_id,courses.name as courses_name,sname,mobileno,email,joiningdate
       from 
       student  left join 
       courses on courses.id=student.courses_id 
       order by student.id desc');
      
        $this->view->loadView('student.index',['data'=>$data]);
    }

    public function create()
    {
        $cdata=$this->cob->fetchData('name,id,fees','name','asc');
       
        $this->view->loadView('student.create',compact('cdata'));
       
    }
    public function store()
    {
        $filename='';
       if($_FILES['profilepic']['name']){
           $type=substr($_FILES['profilepic']['type'],0,strpos($_FILES['profilepic']['type'],'/'));
           //dd($type);
            if($type=='image'){
               $filename= time()."_student-".request('sname')."_". $_FILES['profilepic']['name']; 
               move_uploaded_file($_FILES['profilepic']['tmp_name'],UIMAGES.$filename);
          
            }else{
                $_SESSION['emsg']='File formate not a image type ! ';
                aredirect('student/create');
            }
            
        }
        
        $info=[
            'courses_id'=>request('courses_id'),
            'sname'=>request('sname'),
            'profilepic'=>$filename,
            'mobileno'=>request('mobileno'),
            'othermobile'=>request('othermobile'),
            'address'=>request('address'),
            'email'=>request('email'),
            'referby'=>request('referby'),
            'joiningdate'=>request('joiningdate')
        ];
        
        if($rid=$this->sobj->submitData($info)){
            Session::set('smsg',"Data sumbited successfully");
           

        }else{
            Session::set('emsg',"Something seemed error!");

        }
        aredirect('student');
    }
    public function show()
    {
        echo "<br>THis is show Student controller<br>";
    }
    public function edit($id)
    {
        $cdata=$this->cob->fetchData('name,id,fees','name','asc');

        $info=$this->sobj->fetchInfo(udecode($id));
        $this->view->loadView('student.edit',compact('info','cdata'));
    }
    public function update($id)
    {
        $id=udecode($id);
        $filename=request('oldprofilepic');
        if($_FILES['profilepic']['name']){
            $type=substr($_FILES['profilepic']['type'],0,strpos($_FILES['profilepic']['type'],'/'));
            //dd($type);
             if($type=='image'){
                 if($filename)
                    unlink(UIMAGES.  $filename);
                $filename= time()."_student-".request('sname')."_". $_FILES['profilepic']['name']; 
                move_uploaded_file($_FILES['profilepic']['tmp_name'],UIMAGES.$filename);
                
             }else{
                 $_SESSION['emsg']='File formate not a image type ! ';
                 aredirect('student/edit/'.uencode($id));
             }
         }
         
         $info=[
             'courses_id'=>request('courses_id'),
             'sname'=>request('sname'),
             'profilepic'=>$filename,
            'mobileno'=>request('mobileno'),
            'othermobile'=>request('othermobile'),
            'address'=>request('address'),
            'email'=>request('email'),
            'referby'=>request('referby'),
            'joiningdate'=>request('joiningdate')
        ];
        
        if($rid=$this->sobj->submitData($info,$id)){
            Session::set('smsg',"Data updated successfully");
           

        }else{
            Session::set('emsg',"Something seemed error!");

        }
        aredirect('student');
    }
    public function destroy($id)
    {
        if($this->sobj->deleteRecord($id)){
            Session::set('smsg',"Data deleted successfully");
           

        }else{
            Session::set('emsg',"Something seemed error!");

        }
        aredirect('student');
    }
}

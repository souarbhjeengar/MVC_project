<?php
class CoursesController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Courses','cob');
    }
    public function index()
    {
       
        $this->view->loadView('courses.index',['data'=> $this->cob->fetchData()]);
    }

    public function create()
    {
      
        $this->view->loadView('courses.create');
       
    }
    public function store()
    {
       
        
        $info=[
            'name'=>request('name'),
            'description'=>request('description'),
            'fees'=>request('fees')
        ];
        
        if($rid=$this->cob->submitData($info)){
            Session::set('smsg',"Data sumbited successfully");
           

        }else{
            Session::set('emsg',"Something seemed error!");

        }
        aredirect('courses');
    }
    public function show()
    {
        echo "<br>THis is show Courses controller<br>";
    }
    public function edit($id)
    {
        $info=$this->cob->fetchInfo(udecode($id));
        $this->view->loadView('courses.edit',compact('info'));
    }
    public function update($id)
    {
        $id=udecode($id);
        
        $info=[
            'name'=>request('name'),
            'description'=>request('description'),
            'fees'=>request('fees')
        ];
        
        if($rid=$this->cob->submitData($info,$id)){
            Session::set('smsg',"Data updated successfully");
           

        }else{
            Session::set('emsg',"Something seemed error!");

        }
        aredirect('courses');
    }
    public function destroy($id)
    {
        if($this->cob->deleteRecord($id)){
            Session::set('smsg',"Data deleted successfully");
           

        }else{
            Session::set('emsg',"Something seemed error!");

        }
        aredirect('courses');
    }
}

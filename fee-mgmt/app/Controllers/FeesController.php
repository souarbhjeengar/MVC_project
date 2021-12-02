<?php
class FeesController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Student','sobj');
        $this->loadModel('Courses','cob');
        $this->loadModel('Fees');

    }
    public function index()
    {
        $wh=" where 1";
        if(request('from')){
         if(request('from') && request('to'))
         {
           
            if(strtotime(request('from'))<=strtotime(request('to'))){
                $wh.=" and (  fees.date between '".request('from')."' and '".request('to')."')";
            }else{
                echo "hello";
                 Session::set('emsg',"From  date must be smaller then To date!");

            }
             
         }else{
             Session::set('emsg',"Both from and to date must by selected!");
         }
        }
        
         $sql="select fees.id as id,courses.name as courses_name,courses.fees as cfees,sname,mobileno,fees.fees as submited_fees, fees.date as submited_fees_date,fees.student_id as student_id
        from 
        student  left join 
        courses on courses.id=student.courses_id 
        Right join fees 
        on      fees.student_id=student.id
       $wh
        order by fees.date desc";
        $sdata= $this->sobj->exeQuery($sql);
        if(!isset($sdata[0])){
            $data[0]=$sdata;
        }else{
            $data=$sdata;
        }
        //dd($data);
        $this->view->loadView('fees.index',['data'=>$data]);
    }
    public function dueList()
    {
        $wh=" where 1";
        if(request('from')){
         if(request('from') && request('to'))
         {
           
            if(strtotime(request('from'))<=strtotime(request('to'))){
                $wh.=" and (  fees.date between '".request('from')."' and '".request('to')."')";
            }else{
                echo "hello";
                 Session::set('emsg',"From  date must be smaller then To date!");

            }
             
         }else{
             Session::set('emsg',"Both from and to date must by selected!");
         }
        }
        
        $sql="select fees.id as id,courses.name as courses_name,courses.fees as cfees,sname,mobileno,courses.fees-sum(fees.fees) as due_fees,  sum(fees.fees) as submited_fees,fees.date as submited_fees_date,fees.student_id as student_id from student left join courses on courses.id=student.courses_id Right join fees on fees.student_id=student.id

        $wh
        GROUP by fees.student_id
        order by fees.date desc";
        $sdata= $this->sobj->exeQuery($sql);
        if(!isset($sdata[0])){
            $data[0]=$sdata;
        }else{ 
            $data=$sdata;
        }
        //dd($data);
        //dd($data);
        $this->view->loadView('fees.duelist',['data'=>$data]);
    }

    public function create($sid)
    {
        $sid=udecode($sid);
        $sdata= $this->sobj->exeQuery("select 
        student.id as sstudent_id,courses_id,courses.name as courses_name,courses.fees as cfees,sname,mobileno,email,joiningdate,fees.fees as submited_fees, fees.date as submited_fees_date
        from 
        student  left join 
        courses on courses.id=student.courses_id 
        left join fees 
        on      fees.student_id=student.id
       where student.id=$sid");
      
        $this->view->loadView('fees.create',compact('sdata'));
       
    }
    
  
    public function store()
    {
       
        
        $info=[
            'student_id'=>request('student_id'),
            'fees'=>request('fees'),
            'date'=>request('date'),
        ];
        
        if($rid=$this->fees->submitData($info)){
            Session::set('smsg',"Data sumbited successfully");
           

        }else{
            Session::set('emsg',"Something seemed error!");

        }
        aredirect('student');
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

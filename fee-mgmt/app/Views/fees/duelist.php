<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Module</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Due Fees</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<div class="container">
<!-- <div class="card-body">
<form role="form" method="GET" action="<?=ROOT.'fees/index';?>" id="quickForm"  >
<label for="from">From</label>
                    <input type="date"  class="form-control" id="from" name="from"   value="<?=request('from')??date('Y-m-d',time()-(3600*24*30));;?>" >
                    <br>
                    <label for="to">To</label>
                    <input type="date"  class="form-control" id="to" name="to"   value="<?=request('to')??date('Y-m-d',time());?>" >
                    <br>
                    <button>Search</button>
                  
</div> -->
<div class="card-body">
                <?php if(Session::get('smsg')){
                  ?>
                  <div class="alert alert-success">
                    <?=Session::get('smsg');?>
                  </div>
                  <?php 
                  Session::delete('smsg');
                }
                ?>
                <?php if(Session::get('emsg')){
                  ?>
                  <div class="alert alert-danger">
                    <?=Session::get('emsg');?>
                  </div>
                  <?php 
                   Session::delete('emsg');
                }
                ?>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <th>Student Name</th>
                    <th>Courses Name</th>
                    <th>Mobile Number</th>                    
                    <th>Course Fees</th>
                    <th>Submited Fees</th>
                    <th>Due Fees</th>
                    <th>Last Submited Fees Date</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $index=0;
                  foreach($data as $info){?>
                  <tr>
                    <td><?=++$index;?></td>
                    <td><a href="<?=ROOT.'student/edit/'.uencode($info['student_id']);?>"><?=$info['sname'];?></a>
                    </td>
                    <td><?=$info['courses_name'],"($info[cfees])";?>
                    </td>
                    <td><?=$info['mobileno'];?></td>
                    <td> <?=$info['cfees'];?></td>
                    <td> <?=$info['submited_fees'];?></td>
                    <td> <b><?=$info['due_fees'];?> </b></td>
                    <td> <?=date('d-M-Y',strtotime($info['submited_fees_date']));?></td>
                    
                  </tr> 
                  <?php } ?>
                    </tbody>
                  <tfoot>
                  <tr>
                  <tr>
                  <th>S.No.</th>
                    <th>Student Name</th>
                    <th>Courses Name</th>
                    <th>Mobile Number</th>                    
                    <th>Course Fees</th>
                    <th>Submited Fees</th>
                    <th>Due Fees</th>
                    <th>Last Submited Fees Date</th>
                   
                  </tr>
                  </tfoot>
                </table>
              </div>
</div>

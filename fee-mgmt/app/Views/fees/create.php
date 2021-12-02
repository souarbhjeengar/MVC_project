 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Module</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Fees</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<div class="container">
<div class="card-body">
<div class="card card-primary">
              <?php if(Session::get('emsg')){
                  ?>
                  <div class="alert alert-danger">
                    <?=Session::get('emsg');?>
                  </div>
                  <?php 
                   Session::delete('emsg');
                }
                ?>
              <div class="card-header">
                <h3 class="card-title">Student Fees</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
              <form role="form" method="POST" action="<?=ROOT.'fees/store';?>" id="quickForm" enctype="multipart/form-data" >
                <div class="card-body">
                <div class="form-group">
                    <label for="sname">Student Name</label>
                    <input type="text"  class="form-control" id="sname"  readonly value="<?=$sdata['sname']??$sdata[0]['sname'];?>" >
                  </div>
                
                
                  <div class="form-group">
                    <label for="mobileno">Mobile Number</label>
                    <input type="text"  class="form-control" id="sname"  readonly value="<?=$sdata['mobileno']??$sdata[0]['mobileno'];?>" >
                  </div>
                  <div class="form-group">
                    <label for="courses_id"> Courses</label>
                    <input type="text"  class="form-control" id="sname"  readonly value="<?=$sdata['courses_name']??$sdata[0]['courses_name'],"(",$cfees=$sdata['cfees']??$sdata[0]['cfees'],")";?>" >
                  </div>
                  <?php 
                    $total=0;
                  if(isset( $sdata['submited_fees']) && $sdata['submited_fees']){
                    $total=$sdata['submited_fees'];
                    ?>
                  <div class="form-group">
                    <label for="courses_id"> 1's Installment </label>
                    <input type="text"  class="form-control" id="sname"  readonly value="<?=$sdata['submited_fees'], " (",date('d-M-Y',strtotime($sdata['submited_fees_date']))," )";?>" >
                  </div>
                  <?php }else{
                    if(isset( $sdata[0]['submited_fees']) && $sdata[0]['submited_fees']){
                      $index=1;
                      $total=0;
                      foreach($sdata as $sinfo){
                        $total+=$sinfo['submited_fees'];
                    ?>
                      <div class="form-group">
                    <label for="courses_id"> <?=$index++;?>'s Installment </label>
                    <input type="text"  class="form-control" id="sname"  readonly value="<?=$sinfo['submited_fees'], " (",date('d-M-Y',strtotime($sinfo['submited_fees_date']))," )";?>" >
                  </div>
                    <?php
                      }
                      ?>
                       <div class="form-group">
                    <label for="courses_id"> Total Submited Yet:  </label>
                    <input type="text"  class="form-control" id="sname"  readonly value="<?=$total;?>" >
                  </div>
                      <?php
                    } 
                  } 
                  $duefees=$cfees-$total;
                  ?>
                   <div class="form-group">
                    <label for="fees"> Due Fees</label>
                    <input type="hidden" name="student_id" value="<?=$sdata['sstudent_id']??$sdata[0]['sstudent_id'];?>">
                    <input type="number" name="fees" class="form-control" id="joiningdate" value="<?=$duefees;?>" >
                  </div>
                  <div class="form-group">
                    <label for="joiningdate"> Date</label>
                    <input type="date" name="date" class="form-control" id="joiningdate" max="<?=date('Y-m-d');?>" value="<?=date('Y-m-d');?>" >
                  </div>
                 
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
              </div>
</div>

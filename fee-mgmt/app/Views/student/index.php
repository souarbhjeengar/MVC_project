<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Module</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">List</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<div class="container">
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
                    <th>Email</th>
                    <th>Joinging Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $index=0;
                  foreach($data as $info){?>
                  <tr>
                    <td><?=++$index;?></td>
                    <td><?=$info['sname'];?>
                    </td>
                    <td><?=$info['courses_name'];?>
                    </td>
                    <td><?=$info['mobileno'];?></td>
                    <td> <?=$info['email'];?></td>
                    <td> <?=date('d-M-Y',strtotime($info['joiningdate']));?></td>
                    <td>
                    <a href="<?=ROOT."fees/create/". uencode($info['id']) ;?>">Fees</a> 
                         &nbsp;| &nbsp; 
                    <a href="<?=ROOT."student/edit/". uencode($info['id']) ;?>">Edit</a> 
                         &nbsp;| &nbsp;  
                         <a href="#" onclick="confirmmsg('<?=ROOT."student/destroy/$info[id]";?>')">Delete</a>
                    </td>
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
                    <th>Email</th>
                    <th>Joinging Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
</div>

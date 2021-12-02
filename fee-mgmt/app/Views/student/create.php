 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Module</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Student</a></li>
              <li class="breadcrumb-item active">Create</li>
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
                <h3 class="card-title">Student Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
              <form role="form" method="POST" action="<?=ROOT.'student/store';?>" id="quickForm" enctype="multipart/form-data" >
                <div class="card-body">
                <div class="form-group">
                    <label for="sname">Student Name</label>
                    <input type="text" name="sname" class="form-control" id="sname" placeholder="Enter Student Name" required>
                  </div>
                
                  <div class="form-group">
                    <label for="courses_id">Select Courses</label>
                    <select name="courses_id" class="form-control" id="courses_id">
                      <option value="">Select Course</option>
                      <?php 
                      foreach($cdata as $cinfo){
                        ?>
                          <option value="<?=$cinfo['id'];?>">
                          <?=setstr($cinfo['name'])." ( $cinfo[fees] ) ";?>
                          </option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="mobileno">Mobile Number</label>
                    <input type="text" name="mobileno" class="form-control" id="mobileno" placeholder="Enter Mobile Number" pattern="[0-9]{10}" required>
                  </div>
                  <div class="form-group">
                    <label for="othermobile"> Other Mobile Number</label>
                    <input type="text" name="othermobile" class="form-control" id="othermobile" placeholder="Enter Other Mobile Number" pattern="[0-9]{10}" >
                  </div>
                  <div class="form-group">
                    <label for="email"> Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}"  >
                  </div>
                  
                  <div class="form-group">
                    <label for="referby"> Referance By</label>
                    <input type="text" name="referby" class="form-control" id="referby" placeholder="Who suggest you"  >
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" id="address" placeholder="Enter Address" ></textarea>
                  </div>
                  <div class="form-group">
                    <label for="joiningdate">Joining Date</label>
                    <input type="date" name="joiningdate" class="form-control" id="joiningdate" value="<?=date('Y-m-d');?>" >
                  </div>
                  <div class="form-group">
                    <label for="profilepic">Profile Picture:</label>
                    <input type="file" name="profilepic" class="form-control" id="profilepic" accept="image/*" >
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

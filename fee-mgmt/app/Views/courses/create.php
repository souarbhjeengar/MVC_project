 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Courses Module</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Courses</a></li>
              <li class="breadcrumb-item active">Create</li>
            </ol>
          </div>
        </div>
      </div>
</section>
<div class="container">
<div class="card-body">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Courses Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="<?=ROOT.'courses/store';?>" id="quickForm" novalidate="novalidate">
                <div class="card-body">
                  <div class="form-group">
                    <label for="cname">Course Name</label>
                    <input type="text" name="name" class="form-control" id="cname" placeholder="Enter course name">
                  </div>
                  <div class="form-group">
                    <label for="cfees">Course Fees</label>
                    <input type="number" name="fees" class="form-control" id="cfees" placeholder="Enter Fees">
                  </div>
                  <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="textarea" name="description" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="Description"></textarea>
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

<?php
  require_once('functions/function.php');
  needtologin();
  get_header();
  get_sidebar();


  $select='SELECT * FROM employee_type ORDER BY employee_type_id DESC';
  $employee_type=mysqli_query($con,$select);

  $id=$_GET['e'];
  $select="SELECT * FROM employee WHERE emp_slug='$id'";

  $Query=mysqli_query($con,$select);
  $data=mysqli_fetch_assoc($Query);
    
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="row">
              <div class="col-md-10 card_header_text">
                <b>Update Employee Information</b>
              </div>
              <div class="col-md-2 card_header_for_one_button">
                
              </div>
            </div>
          </div>
          <form method="post" action="submit-edit-employee.php" enctype="multipart/form-data">
            
          <input type="hidden" class="form-control" id="" name="emp_slug" value="<?= $id ?>" required>
          <input type="hidden" class="form-control" id="" name="emp_old_photo" value="<?= $data['emp_photo'] ?>" required>
          <div class="card-body">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Name <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="" name="emp_name" value="<?=$data['emp_name']?>" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="emp_email" name="emp_email" value="<?=$data['emp_email']?>" required> 
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Mobile <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="" name="emp_mobile" value="<?=$data['emp_mobile']?>" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Address <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="" name="emp_address" value="<?=$data['emp_address']?>" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">NID <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="" name="emp_nid" value="<?=$data['emp_nid']?>" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Joining Date <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="" name="emp_joining_date" value="<?=$data['emp_joining_date']?>" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Employee Type <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <?php   
                  foreach($employee_type as $emptyp){
                  ?>
                  <select class="form-control" id="" name="employee_type_id" required>
                    <option value="<?=$emptyp['employee_type_id']?>" <?php if($emptyp['employee_type_id']==$data['employee_type_id']){ echo "selected"; } ?> >
                      <?=$emptyp['employee_type_name']?>
                    </option>
                  </select>
                  <?php   
                    }
                  ?>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Photo <span class="text-danger"></span></label>
                <div class="col-sm-8">
                  <?php 
                    if($data['emp_photo']!=''){
                  ?>
                      <img src="uploads/<?=$data['emp_photo']?>" height="40px" width="40px">
                  <?php 
                    }else{
                  ?>
                      <img src="assets/img/avatar.jpg" height="60px" width="60px">
                  <?php 
                    }
                  ?>
                  <br>
                  <br>
                  <input type="file" onchange="readURL(this);" class="form-control" id="" name="emp_photo">
                  <br>
                  <img id="image_preview" src="#" alt=""/>
                </div>
                <div class="col-sm-1"></div>
              </div>
          </div>
          
          <div class="card-footer text-muted text-center">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
          </form>
        </div>
      </div>        
      <!-- /.content -->
      </div>
    <!-- /.content-wrapper -->
  
<?php
  get_footer();
?>
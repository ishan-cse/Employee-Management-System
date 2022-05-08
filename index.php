<?php
  require_once('functions/function.php');
  needtologin();
  get_header();
  get_sidebar();

  $id=$_SESSION['id'];
  $select="SELECT * FROM employee WHERE emp_id='$id'";
  $Query=mysqli_query($con,$select);
  $data=mysqli_fetch_assoc($Query);
  
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <hr>
        <div class="row">
          <div class="col-md-4">  
          </div>
          <div class="col-md-4">
            <?php
            if($_SESSION['role_id']!=1){

            if($data['emp_active_status']=='1'){
            
            if($data['emp_checkin_status']=='0'){
            ?>
            <a href="check-in.php?checkin=<?= $data['emp_slug'] ?>" class="btn btn-info btn-lg"><b>Check In</b></a>
            <?php
            }elseif($data['emp_checkin_status']=='1'){
            ?>
            <a href="check-out.php?checkout=<?= $data['emp_slug']; ?>" class="btn btn-danger btn-lg"><b>Check Out</b></a>
            <?php
            }
            }elseif($data['emp_active_status']=='0'){
            ?>
              <h3 class="text-danger text-center"><b>Account blocked.</b></h3>
            <?php
              }
            }
            ?>
          </div>
          <div class="col-md-4">  
          </div>
        </div>
        
        <hr>
        <!-- Small boxes (Stat box) -->
        
        <div class="row">
          
        </div> 
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          
        <!-- /.content -->
        </div>
  <!-- /.content-wrapper -->
  
<?php
  get_footer();
?>

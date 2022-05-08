<!DOCTYPE html>
<html>
  <head>
      <title> EMS </title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- add icon link -->
      <link rel = "icon" href ="assets/img/icon_logo.png" type = "image/x-icon">
      <link rel="stylesheet" href="assets/css/all.min.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <script src="assets/js/jquery-3.4.1.min.js"></script>
  </head>
<body class="hold-transition sidebar-mini layout-fixed">

<br><br><br>
<!-- Main content -->
  <div class="container-fluid">
    <!-- Main row -->
    <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <div class="card">
      <div class="card-header bg-light">
        <div class="row">
          <div class="col-md-6 card_header_text">
            Log In
          </div>
          <div class="col-md-6 card_header_for_one_button float-sm-right">
          <?php
          require_once('functions/function.php');

          if(!empty($_POST))
          {
            $emp_email=$_POST['emp_email'];
            $password=md5($_POST['emp_password']);
            
            $select_emp="SELECT * FROM employee WHERE emp_email='$emp_email' AND emp_password='$password'";
            $Q_emp=mysqli_query($con,$select_emp);
            $Q_emp_data=mysqli_fetch_assoc($Q_emp);

            $select_sa="SELECT * FROM super_admin WHERE sa_email='$emp_email' AND sa_password='$password'";
            $Q_sa=mysqli_query($con,$select_sa);
            $Q_sa_data=mysqli_fetch_assoc($Q_sa);
            
            if($Q_emp_data){
                  if($Q_emp_data['emp_active_status']=='1'){
                    
                    $_SESSION['id']=$Q_emp_data['emp_id'];
                    $_SESSION['email']=$Q_emp_data['emp_email'];
                    $_SESSION['name']=$Q_emp_data['emp_name'];
                    $_SESSION['photo']=$Q_emp_data['emp_photo'];
                    $_SESSION['role_id']=$Q_emp_data['role_id'];
                    $_SESSION['emp_slug']=$Q_emp_data['emp_slug'];
                    $_SESSION['emp_password']=$Q_emp_data['emp_password'];
                    $_SESSION['success_alert']='0';

                    if($Q_emp_data['role_id']=='1'){
                      header('Location: index.php');
                    }else{
                      header('Location: my-profile.php');
                    }

                  }else{
                    echo '<span class="text-danger"><b>Your account is blocked!<b></span>';
                  }
                }elseif($Q_sa_data){
                    $_SESSION['id']="SA1";
                    $_SESSION['email']=$Q_sa_data['sa_email'];
                    $_SESSION['name']="Admin";
                    $_SESSION['photo']="";
                    $_SESSION['role_id']=$Q_sa_data['role_id'];
                    $_SESSION['sa_password']=$Q_sa_data['sa_password'];
                    $_SESSION['success_alert']='0';

                    header('Location: index.php');       
                }else{
                    echo '<span class="text-danger"><b>Your email or password did not match!<b></span>';
                    //header('Location: login.php');
                }
          }
          ?>
          </div>
        </div>
      </div>
      <form method="post" action="">
        
      <div class="card-body">
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
            <div class="col-sm-8">
              <input type="email" class="form-control" id="" name="emp_email" required>
            </div>
            <div class="col-sm-1"></div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="" name="emp_password" required>
            </div>
            <div class="col-sm-1"></div>
          </div>
      </div>
      
      <div class="card-footer text-muted text-center">
        <button type="submit" class="btn btn-success">Log in</button>
      </div>
      </form>
    </div>
    <div class="col-md-3"></div>
  </div>        
  </div>
    <!-- all js link -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
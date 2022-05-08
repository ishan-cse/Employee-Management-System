<?php
  require_once('functions/function.php');
  needtologin();
  get_header();
  get_sidebar();


  $select='SELECT * FROM employee ORDER BY emp_id DESC';
  $Query=mysqli_query($con,$select);

  $select='SELECT * FROM employee_type ORDER BY employee_type_id DESC';
  $employee_type=mysqli_query($con,$select);

  if($_SESSION['success_alert']=='1'){
  ?>
  <script>
    swal({title: "Done!", text: "Employee registration successfull!", icon: "success", button: "OK",});
  </script>
  <?php
    $_SESSION['success_alert']='0';
  }elseif($_SESSION['success_alert']=='2'){
  ?>
  
  <script>
    swal({title: "Done!", text: "Employee information updated successfully!", icon: "success", button: "OK",});
  </script>
  <?php
    $_SESSION['success_alert']='0';
  }elseif($_SESSION['success_alert']=='3'){
  ?>
  <script>
    swal({title: "Done!", text: "Employee deleted successfully!", icon: "success", button: "OK",});
  </script>
  <?php
    $_SESSION['success_alert']='0';
  }elseif($_SESSION['success_alert']=='4'){
  ?>
  <script>
    swal({title: "Done!", text: "Employee blocked successfully!", icon: "success", button: "OK",});
  </script>
  <?php
    $_SESSION['success_alert']='0';
  }elseif($_SESSION['success_alert']=='5'){
  ?>
  <script>
    swal({title: "Done!", text: "Employee unblocked successfully!", icon: "success", button: "OK",});
  </script>
  <?php
    $_SESSION['success_alert']='0';

  }
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
                    <b>All Employee</b>
                  </div>
                  <div class="col-md-2 card_header_for_one_button">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                      <tr>
                        <th>Employee Name</th>
                        <th>Employee Email</th>
                        <th>Employee Phone</th>
                        <th>Employee joining date</th>
                        <th>Employee Type</th>
                        <th>Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($Query as $data){
                      ?>
                        <tr>
                          <td><?= $data['emp_name']; ?></td>
                          <td><?= $data['emp_email']; ?></td>
                          <td><?= $data['emp_mobile']; ?></td>
                          <td><?= $data['emp_joining_date']; ?></td>
                          <td>
                            <?php   
                              foreach($employee_type as $emptyp){                    
                                if($emptyp['employee_type_id']==$data['employee_type_id']){
                                  
                                  echo $emptyp['employee_type_name'];

                                }
                              }
                            ?>
                          </td>
                          <td>
                            <a href="view-employee.php?v=<?= $data['emp_slug']; ?>"><i class="fas fa-plus-square"></i></a>
                            <a href="edit-employee.php?e=<?= $data['emp_slug']; ?>"><i class="fas fa-edit"></i></a>
                            <?php
                            if($data['emp_active_status']=='1'){
                            ?>
                            <a href="block-employee.php?b=<?= $data['emp_slug']; ?>"><i class="fas fa-unlock text-success"></i></a>
                            <?php
                            }elseif($data['emp_active_status']=='0'){
                            ?>
                            <a href="unblock-employee.php?un_block=<?= $data['emp_slug']; ?>"><i class="fas fa-lock text-danger"></i></a>
                            <?php
                            }
                            ?>
                            <a href="delete-employee.php?d=<?= $data['emp_slug']; ?>"><i class="fas fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer text-muted">

              </div>
            </div>
          </div>
        </div>
      </div> 
    </section>         
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<?php
  get_footer();
?>

<script>
    
    $(document).ready(function(){
      $('#dataTable').DataTable();
    });

</script>
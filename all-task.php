<?php
  require_once('functions/function.php');
  needtologin();
  get_header();
  get_sidebar();

  $select="SELECT * FROM employee_task INNER JOIN employee ON employee_task.assigned_employee_id=employee.emp_id ORDER BY emp_task_id DESC";
  $Query=mysqli_query($con,$select);
  
  if($_SESSION['success_alert']=='1'){
  ?>
  
  
  <script>
    swal({title: "Done!", text: "Task assigned successfully!", icon: "success", button: "OK",});
  </script>

  <?php
  $_SESSION['success_alert']='0';
  }
  if($_SESSION['success_alert']=='4'){
  ?>
    <script>
      swal({title: "Oops!", text: "File does not exist!", icon: "error", button: "OK",});
    </script>
  <?php
      $_SESSION['success_alert']='0';
  }

  if($_SESSION['success_alert']=='5'){
    
  ?>
    <script>
      swal({title: "Oops!", text: "Filename is not defined!", icon: "error", button: "OK",});
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
                    <b>All Assigend Tasks</b>
                  </div>
                  <div class="col-md-2 card_header_for_one_button">
                    <?php
                      if($_SESSION['role_id']=='1'){
                    ?>
                    
                    <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                      <tr>
                        <th>Task Title</th>
                        <th>Task Details</th>
                        <th>Assigned Employee</th>
                        <th>Assigned Date</th>
                        <th>Due Date</th>
                        <th>Task Status</th>
                        <th>Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($Query as $data){
                      ?>
                        <tr>
                          <td><?= $data['emp_task_title']; ?></td>
                          <td><?= $data['emp_task_details']; ?></td>
                          <td><?= $data['emp_name']; ?></td>
                          <td><?= $data['emp_task_assign_date']; ?></td>
                          <?php
                          if($data['emp_task_complete_status']=='0' && date("Y-m-d")>$data['emp_task_due_date']){
                          ?> 
                          <td class="text-danger"><?= $data['emp_task_due_date']; ?></td>
                          <?php
                          }else{
                          ?>
                          <td><?= $data['emp_task_due_date']; ?></td>
                          <?php
                          }
                          ?>
                          <td>
                            <?php 
                              if($data['emp_task_complete_status']==0){
                                echo "Incomplete";
                              }elseif($data['emp_task_complete_status']==1){
                                echo "Completed";
                              }
                            ?>
                          </td>
                          <td>
                            <a href="comment-task.php?c=<?= $data['emp_task_slug']; ?>"><i class="fas fa-comments"></i></a>
                            <a href="download-task-work.php?path=uploads/task_works/<?= $data['task_work_file']; ?>"><i class="fas fa-download"></i></a>
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


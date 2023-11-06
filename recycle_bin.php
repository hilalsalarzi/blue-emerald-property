<?php
require_once('session_data.php');
$user_id = $_SESSION['user_id'];

?>


  
<!DOCTYPE html>
<html>
<title>Entry Management System</title>
    

<?php require_once('my_meta.php'); ?>


    <body>


        <!-- Navigation Bar-->
        <head>
        
         
         <?php require_once('my_header.php'); ?>
        
        <link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css" />
           <!-- DataTables link files -->
         <?php require_once('datatable_link_files.php'); ?>
          <!-- DataTables link files end -->
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="dist/jquery.js"></script>
        </head>
        <div class="wrapper">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                          
                        </div>

                        <h4 class="page-title">Add Details</h4>
                        <ol class="breadcrumb">
                        
                        </ol>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>Item List</b></h4>
                            

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>                              
                                    <th>Serial #</th>
                                    <th>Dated</th>
                                    <th>S/R</th>
                                    <th>Type</th>
                                    <th>Room</th>
                                    <th>Project / Loction</th>
                                    <th>Size</th>
                                    <th>Property No. / Floor</th>
                                    <th>Tower</th>
                                    <th>Price / Rent</th>
                                    <th>Other Details  -  PVT Building Name</th>
                                    <th>Keys Status</th>
                                    <th>ERE Agent</th>
                                    <th>Agent's Name</th>
                                    <th>R.E Name</th>
                                    <th>Bayut Instructions</th>
                                    <th>Bayut</th>
                                    <th>Dubizzle Featured End Date</th>
                                    <th>Dubizzle Instructions</th>
                                    <th>Inserted By</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                 <tbody>
                 <?php 
                   $today = date("Y-m-d");              
 $select_qry2 = mysqli_query($my_connection, "select  i.id as uidtb ,  i.dated ,  i.s_r ,  i.type ,  i.room ,  i.project_location ,  i.size ,  i.property_number_floor ,  i.tower ,  i.price_rent ,  i.description ,  i.key_status ,  i.ere_agent ,  i.agent_name ,  i.r_e_name ,  i.bayut_instruction ,  i.bayut ,  i.dubizzle_featured_end_date ,  i.dubizzle_instructions ,  i.user_id ,  i.created_at ,  i.status  ,s_r.id as s_rName,room.id,room.rname as rname,i.`del _status`,s_r.name as s_r,u.name as name from items i 
 join 
 users as u
 on i.user_id = u.id 
 inner join s_r on s_r.id=i.s_r
 inner join room on room.id=i.room

                                          where     i.`del _status`='1' ") or die(mysqli_error($my_connection));
                                $n = 1;
                                  while($row2 = mysqli_fetch_array($select_qry2)){
                                 echo $id = $row2['uidtb'];
                             echo ' <tr role="row" class="odd">';
                                    
                                    echo '<td> '.$n++.'</td>';
                                        
                                    echo  '<td class="">';
                                    echo   $formattedDate = date("j F, Y", strtotime($row2['dated']));
                                    echo '</td>';
                                          echo  '<td class="">';
                                          echo $row2['s_r'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['type'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['rname'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['project_location'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['size'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['property_number_floor'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['tower'];
                                          echo '</td>';
                        
                                          echo  '<td class="">';
                                          echo $row2['price_rent'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['description'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['key_status'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['ere_agent'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['agent_name'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['r_e_name'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['bayut_instruction'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['bayut'];
                                          echo '</td>';
                                    
                                          echo  '<td class="">';
                                          echo   $formattedDate = date("j F, Y", strtotime($row2['dubizzle_featured_end_date']));
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['dubizzle_instructions'];
                                          echo '</td>';

                                          echo  '<td class="">';
                                          echo $row2['name'];
                                          echo '</td>';
                                           

                                          
                                       echo '<td style="width:90px;">';
                                
                                 
                                 ?>
 <a class="btn btn-sm mt-1 btn-danger shadow text-white title" title="Delete" onclick="deleteData(<?php echo $id ?>)"><span><i class="ti-trash"></i></span></a>                                 
 <a class="btn btn-sm mt-1 btn-primary shadow text-white title" title="Restore" onclick="restoreData(<?php echo $id ?>)"><span><i class="ti-back-right"></i></span></a>                                 
                              <?php        echo '</td>';
                                     echo '</tr>';
                            }     
                                   ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <?php require_once('my_footer.php'); ?>
                <!-- End Footer -->
            </div> <!-- end container -->
        </div> <!-- end wrapper -->
        <!-- jQuery  -->
       <?php require_once('jq_files.php'); ?>
        <!--End jQuery  -->
         <!-- datatable_script_files -->
                <?php require_once('datatable_script_files.php'); ?>
                <!-- End datatable_script_files --> 
    </body>
</html>
<script>
  var showImage1 = function(event) {
  var uploadField = document.getElementById("file");
  //alert("hello");
  if (uploadField.files[0].size > 900000) {
  uploadField.value = "";
  Swal.fire(
  'Error !',
  'File Size is too big! Upload logo under 900kB !',
  'error'
  ).then((result) => {
  if (result.isConfirmed) {}
  });
  } else {
  var logoId = document.getElementById('img');
  logoId.src = URL.createObjectURL(event.target.files[0]);
  }
  }
  </script>
  <script type="text/javascript">
      function deleteData(id) {
        Swal.fire({
          title: 'Are you sure?',
          text: "To delete the selected record !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "recycle_bin.php?cat_id=" + id;
          }
        });
      }
    </script>
    <?php
    //////Deletion Query OF Category

    if (isset($_GET['cat_id'])) {
      $cat_id = $_GET['cat_id'];

      $sql1  = "DELETE FROM `items`  WHERE id = '$cat_id'";
      $run1 = mysqli_query($my_connection, $sql1);


      if ($run1) {
        echo "<!DOCTYPE html>
        <html>
          <body>
            <script>
            Swal.fire(
            'Deleted!',
            'Property has been successfully deleted!',
            'success'
            ).then((result) => {
            if (result.isConfirmed) {
              window.location.href='recycle_bin.php';
            }
            });
            </script>
          </body>
        </html>";
      } else {
        echo "<!DOCTYPE html>
      <html>
      <body>
        <script>
        Swal.fire(
        'Error !',
        'This Property cannot be Deleted',
        'error'
        ).then((result) => {
        if (result.isConfirmed) {
        }
        });
        </script>
      </body>
      </html>";
      }
    }
    ?>
    <script type="text/javascript">
      function restoreData(id) {
        Swal.fire({
          title: 'Are you sure?',
          text: "To Restore the selected record !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = "recycle_bin.php?restoreData=" + id;
          }
        });
      }
    </script>
    <?php
    //////Deletion Query OF Category

    if (isset($_GET['restoreData'])) {
      $restoreData = $_GET['restoreData'];

      $sql1  = "UPDATE  items  SET `del _status`='0'  WHERE id = '$restoreData'";
      $run1 = mysqli_query($my_connection, $sql1);


      if ($run1) {
        echo "<!DOCTYPE html>
        <html>
          <body>
            <script>
            Swal.fire(
            'Restored!',
            'Property has been successfully Restore!',
            'success'
            ).then((result) => {
            if (result.isConfirmed) {
              window.location.href='recycle_bin.php';
            }
            });
            </script>
          </body>
        </html>";
      } else {
        echo "<!DOCTYPE html>
      <html>
      <body>
        <script>
        Swal.fire(
        'Error !',
        'This Property cannot be Restore',
        'error'
        ).then((result) => {
        if (result.isConfirmed) {
        }
        });
        </script>
      </body>
      </html>";
      }
    }
    ?>
<?php
require_once('session_data.php');
$user_id = $_SESSION['user_id'];
echo $user_id;
?>

<?php
  
    require_once('my_connection.php');
    $warning = '';
    $success = '';
   // $message='';
  if(isset($_POST['btnsave'])){
   // echo 'here is  me'; die();
         $dated = $_POST['dated'];
         $s_r = $_POST['s_r'];
         $type = $_POST['type'];
         $room = $_POST['room'];
         $project_location = $_POST['project_location'];
         $size = $_POST['size'];
         $property_number_floor = $_POST['property_number_floor'];
         $tower = $_POST['tower'];
         $price_rent = $_POST['price_rent'];
         $description = $_POST['description'];
         $key_status = $_POST['key_status'];
         $ere_agent = $_POST['ere_agent'];
         $agent_name = $_POST['agent_name'];
         $r_e_name = $_POST['r_e_name'];
         $bayut_instruction = $_POST['bayut_instruction'];
         $bayut = $_POST['bayut'];
         $dubizzle_featured_end_date = $_POST['dubizzle_featured_end_date'];
         $dubizzle_instructions = $_POST['dubizzle_instructions'];

$check_qry = mysqli_query($my_connection, "select property_number_floor,price_rent from items where property_number_floor = '$property_number_floor' and price_rent = '$price_rent'") or die (mysqli_error($my_connection));

  $num_rows = mysqli_num_rows($check_qry); 
 //Die();

if($num_rows == 0){ 
 $insert_qry = "INSERT INTO `items`(`dated`, `s_r`, `type`, `room`, `project_location`, `size`, `property_number_floor`, `tower`,`price_rent`, `description`, `key_status`, `ere_agent`, `agent_name`, `r_e_name`, `bayut_instruction`, `bayut`, `dubizzle_featured_end_date`, `dubizzle_instructions`, `user_id`)
                            VALUES ('$dated','$s_r','$type','$room','$project_location','$size','$property_number_floor','$tower','$price_rent','$description','$key_status','$ere_agent','$agent_name','$r_e_name','$bayut_instruction','$bayut','$dubizzle_featured_end_date','$dubizzle_instructions','$user_id')"; 
    mysqli_query($my_connection, $insert_qry) or die(mysqli_error($my_connection));
    
        
        $success = '<div class="alert alert-success alert-block alert-dismissible fade in iconic-alert" role="alert">
                                    <div class="alert-icon">
                                        <span class="gcon gcon-emoji-happy centered-xy"></span>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="mcon mcon-close"></span></span></button>
                                    <strong>Success!</strong> Record Inserted.
                            </div>'; 
                            
                
}


else{
    
 $warning = '<div class="alert alert-danger alert-block alert-dismissible fade in iconic-alert" role="alert">
                                    <div class="alert-icon">
                                        <span class="gcon gcon-hand centered-xy"></span>
                                    </div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="mcon mcon-close"></span></span></button>
                                    <strong>Oh snap!</strong> Record Already exist
                                </div>';  
 

   } 

  }
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
        <script src="dist/jquery.js"></script>
        </head>
        <div class="wrapper">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                          
                        </div>

                        <h4 class="page-title">Entry Details</h4>
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
                                   
                                </tr>
                                </thead>
                                 <tbody>
                 <?php 
                   $today = date("Y-m-d");              
 $select_qry2 = mysqli_query($my_connection, "select i.*,s_r.id as s_rName,room.id,room.rname as rname,s_r.name as s_r,u.name as name from items i 
 join 
 users as u
 on i.user_id = u.id 
 inner join s_r on s_r.id=i.s_r
 inner join room on room.id=i.room
                                              where i.user_id = $user_id") or die(mysqli_error($my_connection));
                                $n = 1;
                                  while($row2 = mysqli_fetch_array($select_qry2)){
                                  $id = $row2['id'];
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

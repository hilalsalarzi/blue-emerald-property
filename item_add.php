<?php
require_once('session_data.php');
$user_id = $_SESSION['user_id'];

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

                        <h4 class="page-title">Add Details</h4>
                        <ol class="breadcrumb">
                        
                        </ol>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                            <?php echo $success; ?>
            <?php echo $warning; ?>
            
                                <div class="col-md-12">
   <form class="" role="form" method="post" enctype="multipart/form-data">
                                        
                                        
                                        <div class="row">

                                     
                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Date</label>
                                            <div class="">
                                                <input type="date" class="form-control" placeholder="" name = "dated" required />
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">S/R</label>
                                            <div class="">
                                            <!-- <label>Category</label> -->
                  <select class="form-control " name="s_r">
                    <option>Select S/R</option>
                    <?php
                    $querysr = "SELECT name,id FROM s_r";
                    $run_checksr = mysqli_query($my_connection, $querysr);
                    while ($Datasr = mysqli_fetch_array($run_checksr)) {
                      $idsr = $Datasr['id'];
                      $categorysr  = $Datasr['name'];
                    ?>
                      <option value="<?php echo $idsr; ?>"><?php echo $categorysr; ?>
                      </option>
                    <?php } ?>

                  </select>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Type</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Type" name = "type"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Room</label>
                                            <select class="form-control " name="room">
                    <option>Select Room</option>
                    <?php
                    $query = "SELECT rname,id FROM room";
                    $run_check = mysqli_query($my_connection, $query);
                    while ($Dataroom = mysqli_fetch_array($run_check)) {
                      $idroom = $Dataroom['id'];
                      $categoryroom  = $Dataroom['rname'];
                    ?>
                      <option value="<?php echo $idroom; ?>"><?php echo $categoryroom; ?>
                      </option>
                    <?php } ?>

                  </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Project Location</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Project Location" name = "project_location"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Size</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Size" name = "size"  required/>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Property Number Floor</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Property Number Floor" name = "property_number_floor"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Tower</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Tower" name = "tower"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Price/Rent</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Price/Rent" name = "price_rent"  required/>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class=" control-label">Other Details  -  PVT Building Name</label>
                                            <div class="">
                                            <input type="text"  class="form-control" placeholder="Other Details  - PVT Building Name" name = "description"  required>
                                                <!-- <textarea type="text" rows="" cols="" class="form-control" placeholder="Other Details  - PVT Building Name" name = "description"  required></textarea> -->
                                              
                                            </div>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Key Status</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Key Status" name = "key_status"  required/>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class=" control-label">ERE Agent</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="ERE Agent" name = "ere_agent"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Agent Name</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Agent Name" name = "agent_name"  required/>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-3">
                                            <label class=" control-label">R.E Name</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="R.E Name" name = "r_e_name"  required/>
                                            </div>
                                        </div>
                                        <?php  $role_id = @$_SESSION['role_id'];
if($role_id==1) {
echo $role_id;
    ?>
                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Bayut Instruction</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Bayut Instruction" name = "bayut_instruction"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Bayut</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Bayut" name = "bayut"  required/>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Dubizzle Featured End Date</label>
                                            <div class="">
                                                <input type="date" class="form-control" placeholder="Dubizzle Featured End Date" name = "dubizzle_featured_end_date"  required/>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group col-md-3">
                                            <label class=" control-label">Dubizzle Instructions</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Dubizzle Instructions" name = "dubizzle_instructions"  required/>
                                            </div>
                                        </div>

                                        <?php }?>
                                        
                    
                                                </div>
                                        
                                        
<label class=" control-label col-m-12"></label>
<div class="form-group" style="float: right;">
<button type="submit" class="btn btn-success waves-effect waves-light m-l-8 btn-md" name ="btnsave" >ADD</button>
</div>

                                    </form>
                                
                                </div>
                            </div>
                        </div>
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

                                              where (i.user_id=$user_id) AND (i.`del _status`='0') ") or die(mysqli_error($my_connection));
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
                                   echo ' <a href="#" >        
                             <a  href ="item_edit.php?id='.$id.'" data-toggle="tooltip" data-placement="bottom" title="Edit" style=""> 
                                <i class="ti-pencil" style="font-size:25px; color:success; margin-top:10px; margin-left:0px;"></i>
                                 </a>';
                               
                                 ?>
 <a class="btn btn-sm mt-1 btn-danger shadow text-white title" title="Delete" onclick="deleteData(<?php echo $id ?>)"><span><i class="ti-trash"></i></span></a>                                 
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
            window.location.href = "item_add.php?cat_id=" + id;
          }
        });
      }
    </script>
    <?php
    //////Deletion Query OF Category

    if (isset($_GET['cat_id'])) {
      $cat_id = $_GET['cat_id'];

      $sql1  = "UPDATE  items  SET `del _status`='1'  WHERE id = '$cat_id'";
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
              window.location.href='item_add.php';
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
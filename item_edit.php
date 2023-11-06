<?php
require_once('session_data.php');


?>

<?php
  
    require_once('my_connection.php');

  if(isset($_GET['id'])){
   // echo 'here is  me'; die();
      $item_id = $_GET['id'];
      $select_qry = mysqli_query($my_connection, "SELECT * FROM `items` where id = $item_id") or die(mysqli_error($my_connection));
      $row = mysqli_fetch_assoc($select_qry);
      $dated = $row['dated'];
         $s_r = $row['s_r'];
         $type = $row['type'];
         $room = $row['room'];
         $project_location = $row['project_location'];
         $size = $row['size'];
         $property_number_floor = $row['property_number_floor'];
         $tower = $row['tower'];
         $price_rent = $row['price_rent'];
         $description = $row['description'];
         $key_status = $row['key_status'];
         $ere_agent = $row['ere_agent'];
         $agent_name = $row['agent_name'];
         $r_e_name = $row['r_e_name'];
         $bayut_instruction = $row['bayut_instruction'];
         $bayut = $row['bayut'];
         $dubizzle_featured_end_date = $row['dubizzle_featured_end_date'];
         $dubizzle_instructions = $row['dubizzle_instructions'];
      }

if(isset($_POST['btnupdate'])){
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
    
//die();
        $update_query = mysqli_query($my_connection,"UPDATE `items` SET `dated`='$dated',`s_r`='$s_r',`type`='$type',`room`='$room',`project_location`='$project_location',`size`='$size',`property_number_floor`='$property_number_floor',`tower`='$tower',`price_rent`='$price_rent',`description`='$description',`key_status`='$key_status',`ere_agent`='$ere_agent',`agent_name`='$agent_name',`r_e_name`='$r_e_name',`bayut_instruction`='$bayut_instruction',`bayut`='$bayut',`dubizzle_featured_end_date`='$dubizzle_featured_end_date',`dubizzle_instructions`='$dubizzle_instructions'  WHERE id = '$item_id'") or die (mysqli_error($my_connection));
    ?>
        <?php  $role_id = @$_SESSION['role_id'];
        if($role_id==1) {
        echo $role_id;
            
     echo "<script>
     alert('List has been updated');
    window.location = 'admin_list_all.php';
</script>"; 

}
else {
    echo "<script>
    alert('List has been updated');
    window.location = 'item_add.php';
</script>"; 
} 

 //  header('location:user_registration.php?msg=updated');


      }
      else{
    
     


      }


   

?>
  
<!DOCTYPE html>
<html>
<title>Find Child</title>
    

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

                        <h4 class="page-title">Update Item</h4>
                        <ol class="breadcrumb">
                        
                        </ol>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-12">
   <form class="" role="form" method="post" enctype="multipart/form-data">
                                        
                                        
   <div class="row">

                                     
<div class="form-group col-md-3">
    <label class=" control-label">Date</label>
    <div class="">
        <input type="date" class="form-control" placeholder="" name = "dated" value="<?php echo $dated; ?>" required  />
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">S/R</label>
    <div class="">
    <?php
$sql1 = "SELECT * FROM s_r";
$result1 = mysqli_query($my_connection, $sql1) or die("Query Unsuccessful.");
if(mysqli_num_rows($result1) > 0) {
echo '<Select type="text" id="plaza_id" class="form-control custom-select" name="s_r" placeholder="" Required>';
while ($row1 = mysqli_fetch_assoc($result1)){
if($row1['id']==$s_r){
$select = "selected";
}else{
$select = "";
}
echo "<option {$select} value='{$row1['id']}'>{$row1['name']}</option>";
}
echo "</select>";
}
?>
        <!-- <input type="text" class="form-control" placeholder="" name = "s_r" value="<?php echo $s_r; ?>" required/> -->
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Type</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Type" name = "type" value="<?php echo $type; ?>"  required/>
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Room</label>
    <div class="">
    <?php
$sql1 = "SELECT * FROM room";
$result1 = mysqli_query($my_connection, $sql1) or die("Query Unsuccessful.");
if(mysqli_num_rows($result1) > 0) {
echo '<Select type="text" id="plaza_id" class="form-control custom-select" name="room" placeholder="" Required>';
while ($row1 = mysqli_fetch_assoc($result1)){
if($row1['id']==$room){
$select = "selected";
}else{
$select = "";
}
echo "<option {$select} value='{$row1['id']}'>{$row1['rname']}</option>";
}
echo "</select>";
}
?>
        <!-- <input type="text" class="form-control" placeholder="Room" name = "room" value="<?php echo $room; ?>"  required/> -->
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Project Location</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Project Location" name = "project_location"  value="<?php echo $project_location; ?>" required/>
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Size</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Size" name = "size" value="<?php echo $size; ?>" required/>
    </div>
</div>


<div class="form-group col-md-3">
    <label class=" control-label">Property Number Floor</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Property Number Floor" name = "property_number_floor" value="<?php echo $property_number_floor; ?>"  required/>
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Tower</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Tower" name = "tower" value="<?php echo $tower; ?>" required/>
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Price/Rent</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Price/Rent" name = "price_rent" value="<?php echo $price_rent; ?>"  required/>
    </div>
</div>


<div class="form-group col-md-6">
    <label class=" control-label">Other Details  -  PVT Building Name</label>
    <div class="">
    <input type="text"  class="form-control" placeholder="Other Details  - PVT Building Name" name = "description" value="<?php echo $description; ?>"  required>
        <!-- <textarea type="text" rows="" cols="" class="form-control" placeholder="Other Details  - PVT Building Name" name = "description"  required></textarea> -->
      
    </div>
</div>


<div class="form-group col-md-3">
    <label class=" control-label">Key Status</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Key Status" name = "key_status" value="<?php echo $key_status; ?>" required/>
    </div>
</div>


<div class="form-group col-md-3">
    <label class=" control-label">ERE Agent</label>
    <div class="">
        <input type="text" class="form-control" placeholder="ERE Agent" name = "ere_agent" value="<?php echo $ere_agent; ?>"  required/>
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Agent Name</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Agent Name" name = "agent_name" value="<?php echo $agent_name; ?>"  required/>
    </div>
</div>


<div class="form-group col-md-3">
    <label class=" control-label">R.E Name</label>
    <div class="">
        <input type="text" class="form-control" placeholder="R.E Name" name = "r_e_name" value="<?php echo $r_e_name; ?>"  required/>
    </div>
</div>
<?php  $role_id = @$_SESSION['role_id'];
if($role_id==1) {
echo $role_id;
    ?>
<div class="form-group col-md-3">
    <label class=" control-label">Bayut Instruction</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Bayut Instruction" name = "bayut_instruction" value="<?php echo $bayut_instruction; ?>" required/>
    </div>
</div>

<div class="form-group col-md-3">
    <label class=" control-label">Bayut</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Bayut" name = "bayut" value="<?php echo $bayut; ?>" required/>
    </div>
</div>


<div class="form-group col-md-3">
    <label class=" control-label">Dubizzle Featured End Date</label>
    <div class="">
        <input type="date" class="form-control" placeholder="Dubizzle Featured End Date" name = "dubizzle_featured_end_date" value="<?php echo $dubizzle_featured_end_date; ?>" required/>
    </div>
</div>


<div class="form-group col-md-3">
    <label class=" control-label">Dubizzle Instructions</label>
    <div class="">
        <input type="text" class="form-control" placeholder="Dubizzle Instructions" name = "dubizzle_instructions" value="<?php echo $dubizzle_instructions; ?>" required/>
    </div>
</div>
<?php }?>



        </div>
                                        
<label class=" control-label col-m-12"></label>
<div class="form-group" style="float: right;">
<button type="submit" class="btn btn-success waves-effect waves-light m-l-8 btn-md" name ="btnupdate" >Update</button>
</div>

                                    </form>
                                
                                </div>
                            </div>
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
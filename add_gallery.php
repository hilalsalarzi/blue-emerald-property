<?php
require_once('session_data.php');
$user_id = $_SESSION['user_id'];
$warning = '';
    $success = '';
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

                                        <div class="form-group col-md-6">
                                            <label class=" control-label">Name</label>
                                            <div class="">
                                                <input type="text" class="form-control" placeholder="Name" name = "name"  required/>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class=" control-label">Picture</label>
                                            <div class="">
                                            <input type="file" name="files[]" class="form-control" multiple required>                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class=" control-label">Instruction</label>
                                            <div class="">
                                                <textarea type="text" class="form-control" placeholder="Bayut Instruction" name ="bayut_instruction"  required></textarea>
                                            </div>
                                        </div>

                    
                                                </div>
                                        
                                        
<label class=" control-label col-m-12"></label>
<div class="form-group" style="float: right;">
<button type="submit" class="btn btn-success waves-effect waves-light m-l-8 btn-md" name ="save" >ADD</button>
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
                                    
                                </tr>
                                </thead>
                                 <tbody>
               
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

    <?php
      if (isset($_POST['save'])) 
                    {
                        // gallery
$name=$_POST['name'];
$bayut_instruction=$_POST['bayut_instruction'];
                        $extension = array("jpeg', 'jpg','png','gif");
                        $fileNames = array_filter($_FILES['files']['name']);
                        $sql1 = "INSERT INTO instruction( `name`, `instruction`) 
                                         VALUES ('$name','$bayut_instruction')";
                                         echo $run1 = mysqli_query($my_connection, $sql1);
                                         $last_id = $my_connection->insert_id;
                        if (!empty($fileNames)) 
                        {
                            foreach ($_FILES['files']['name'] as $key => $value) 
                            {
                                $file_name = $_FILES['files']['name'][$key];
                                $filename_tmp = $_FILES['files']['tmp_name'][$key];
                                $timestamp = time();
                                $unifile=$timestamp.'-'.$file_name;
                                $target = "assets/images/gallery/".$unifile;
                                move_uploaded_file($filename_tmp, $target);
                                $item_id = $_POST['item_id'];
                                $sql1 = "INSERT INTO gallery( `name`, `item_id`,`instruction_id`) 
                                         VALUES ('$unifile','$item_id',  $last_id)";


                               echo $run1 = mysqli_query($my_connection, $sql1);
                            }
                        }


    // gallery





                        if ($run1) 
                        {
                // move_uploaded_file($_FILES["b_image"]["tmp_name"], "../../images/bank/" . $_FILES["b_image"]["name"]);
                            echo "<!DOCTYPE html>
                                                <html>
                                                    <body>
                                                    <script>
                                                    Swal.fire(
                                                    'Added!',
                                                    'Gallery has been successfully added!',
                                                    'success'
                                                    ).then((result) => {
                                                    if (result.isConfirmed) {
                                                    window.location.href = 'add_gallery.php';
                                                    }
                                                    });
                                                    </script>
                                                    </body>
                                                </html>";
                        }

                    }
                    ?>
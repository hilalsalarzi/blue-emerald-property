<?php
 require_once('session_data.php');
 $user_id = $_SESSION['user_id'];
?>

<?php
require_once('my_connection.php'); 
?>

<!DOCTYPE html>
<html>
<head>
        <?php require_once('my_meta.php'); ?>
    </head>


    <body>


        <!-- Navigation Bar-->
        

        <?php require_once('my_header.php'); ?>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

              <br>

                <div class="row">

                    <!-- Stationary start -->
  <h4 style="margin-left: 10px;"> User Dashboard</h4>
 <a href = "user_list_all.php">
                    <div class="col-md-6 col-sm-6 col-lg-4" >
                        <div class="card-box widget-box-1 " style="background-color: #54d3f5;">
                               <i class="text-muted pull-right" data-placement="bottom">
                                <p class="text-white">
                             
                             <!-- <i class="label label-success">Piece</i> -->
                              </p> </i>
                          
                            
    <h2 class="text-center text-white">Entries List</h2>
                        </div>
                    </div>
                    
                    </a>
       

              
              

                </div>


<?php //require_once('bar_chart_code/chart_code.php'); ?> 


            


               


                <!-- Footer -->
               
                   <?php require_once('my_footer.php'); ?>
                <!-- End Footer -->

            </div>
        </div>



        <!-- jQuery  -->
           <?php require_once('jq_files.php'); ?>
       

    </body>
</html>
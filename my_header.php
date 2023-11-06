<?php

require_once('session_data.php');
$user_id = $_SESSION['user_id'];
$role_id = @$_SESSION['role_id'];
require_once('my_connection.php');
 
?>

<?php
// $select_qry = mysqli_query($my_connection, "select id,image_path  from users  
// where id = '$user_id'") or die(mysqli_error($my_connection));
//                                   while($row = mysqli_fetch_array($select_qry)){
//                                  $image_path = $row['image_path'];
//                                     }
?>

<header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
              <a href="index.php" class="logo"><span>Entry Management <smal style="color: #2eca6a;">System</small></span></a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                 
                        

                            <li class="dropdown navbar-c-items">
                                <a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/child.jpg" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu">
                                  
                                    <li><a href="logout.php"><i class="ti-power-off text-danger m-r-10"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>

                </div>
            </div>
<?php  if ($role_id == 1){
 

 echo '<div class="navbar-custom">
 <div class="container">
     <div id="navigation">
         <!-- Navigation Menu-->
         <ul class="navigation-menu">
             <li class="has-submenu">
                 <a href="index.php"><i class="md md-dashboard"></i>Dashboard</a>
            
             </li>
             <li class="has-submenu">
                 <a href="#">
                     <i class="md md-settings"></i>Definitions</a>
                 <ul class="submenu">
                   
                     <li><a href="users.php">Add User</a></li>
                     <li><a href="recycle_bin.php">Recycle Bin</a></li>
                    
                    
                    
                 </ul>
             </li>
         </ul>
     </div>
 </div> 
</div> ';




}
else{

    echo '<div class="navbar-custom">
    <div class="container">
        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu">
                    <a href="index_user.php"><i class="md md-dashboard"></i>Dashboard</a>
               
                </li>
                <li class="has-submenu">
                    <a href="#">
                        <i class="md md-settings"></i>Definitions</a>
                    <ul class="submenu">
                    
                       <li><a href="item_add.php">Add Item</a></li>
                       <li><a href="add_gallery.php">Add Gallery</a></li>
                       <li><a href="gallery.php">Gallery</a></li>
                       
                    </ul>
                </li>                 
            </ul>
        </div>
    </div> 
   </div> ';

}
    
    
    
    
    ?>
            





        </header>
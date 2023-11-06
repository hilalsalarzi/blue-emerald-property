<?php 

ob_start();
session_start();

 
//  echo 'HEllo';
//  die();
 ?>
<?php 

require_once('my_connection.php');
 
 ?>


<?php 
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $select = mysqli_query($my_connection, "select * from users where email = '$username' and password = '$password' and status = 0") or die (mysqli_error($my_connection));
 // echo
   $countrows = mysqli_num_rows($select);
  if ($countrows == 1){
   //echo "record exist"; die();
    
      while($row=mysqli_fetch_array($select)){
          
         $user_id = $row['id'];
        $username= $row['name'];
         $role_id = $row['role_id'];
         // $department_id = $row['department_id'];
         // $sub_department_id = $row['sub_department_id'];
         // $organization_id = $row['organization_id'];
         
    }
   // echo '<br />';
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username']= $username;
     $_SESSION['role_id'] = $role_id; 
     // $_SESSION['department_id'] = $department_id;
     // $_SESSION['sub_department_id'] = $sub_department_id;
     // $_SESSION['organization_id'] = $organization_id;
      if($role_id == 1){
      
     header("Location:/emadrealestate/index.php");exit();
      } 

      elseif($role_id == 2)
      {
    header("Location:index_user.php");
    }
 
     else{
    
 }
    
     var_dump($_SESSION);
    exit();
   
    //echo 'hi'; die();
  }
  else{
 //   echo "record not exist"; die();
    $error  = '<div class="alert alert-danger alert-block alert-dismissible fade in iconic-alert" role="alert">
									<div class="alert-icon">
										<span class="gcon gcon-hand centered-xy"></span>
									</div>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><span class="mcon mcon-close"></span></span></button>
									<strong></strong>Username Or Password Is Incorrect<a href="javascript:void(0);" class="alert-link"></a>.
								</div>';
 
  }
}
?>

<!DOCTYPE html>
<html>
	

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>Find Child</title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
		<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-69506598-1', 'auto');
          ga('send', 'pageview');
        </script>

	</head>
	<body>

		<!-- <div class="account-pages" style="background: rgba(255,255,255,0.8); background:url('bg/login_bg.jpg'); 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
opacity: 0.6;"></div> -->
		<div class="clearfix"></div>
		<div style="">
		<div class="wrapper-page" style="opacity: 0.8; padding-top: 50px;">
			<div class="card-box" style="background-color: #797979;">
				<div class="panel-heading">
					<h3 class="text-center" style="color:white;"> Sign In to <br><strong class="text-custom" style="color:white;">Entry Management <span style="color:#2eca6a;">System</span></strong></h3>
				</div>

				<!-- <center><img src="assets/images/logo.png" width="100" /> </center> -->

				<div class="panel-body">
					<form class="form-horizontal m-t-20" action="" method="post">

						<div class="form-group ">
							<div class="col-xs-12">
								  <input class="form-control" type="email" required="" placeholder="Enter Email" name ="username" style="">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
							 <input class="form-control" type="password" required="" placeholder="Enter Password" name = "password">
							</div>
						</div>

				

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
							   <button class="btn btn-block text-uppercase waves-effect waves-light" type="submit" name = "login" style="background-color:#2eca6a; color: white;">Log In</button>
							</div>
						</div>

						
					</form>

				</div>
			</div>
			<div class="row">
				
			</div>

		</div>
		</div>

		<script>
			var resizefunc = [];
		</script>

		<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

	</body>


</html>
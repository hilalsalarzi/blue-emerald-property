<?php
require_once('session_data.php');
$user_id = $_SESSION['user_id'];
$warning = '';
    $success = '';
?>


 
  
<!DOCTYPE html>
<html>
<title>Entry Management System</title>
<style>
    body {
  font-family: Verdana, sans-serif;
  margin: 0;
}

* {
  box-sizing: border-box;
}

.row12 > .column12 {
  padding: 0 8px;
}

.row12:after {
  content: "";
  display: table;
  clear: both;
}

.column12 {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content12 {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: red;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
  
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
  
}

.mySlides12 {
  display: none;
}

.cursor {
  cursor: pointer;
}

/* Next12 & previous buttons */
.prev,
.next12 {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next12 button" to the right */
.next12 {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next12:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext12 {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

img {
  margin-bottom: -4px;
  
}
.dispage>img{
    height: 200px;
}

.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s;
}
.slideimages{
    height: 400px;
}
.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.belowimge{
    height: 100px;
}
</style>

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
                            

                            <div class="row12">
                            <?php
                                    $sql = " select g.id as pid, g.name as picture FROM gallery as g inner join instruction as ins on
                                    ins.id=g.instruction_id";
                                 
                                        
                                    $run = mysqli_query($my_connection, $sql) or die("not connected");
                                    $serial = 1;
                                    while ($row = $run->fetch_assoc()) {
                                        $pid=$row['pid'];
                                     

                                    //   $picture =  $row['hotel_picture'];
                                    //   $location="gallery/".$picture;
                                 ?>
                                       <div class="column12 dispage">
    <img src="assets/images/gallery/<?php echo $row['picture']; ?>"style="width:100%" onclick="openModal();currentSlide(<?php echo $pid?>)" class="hover-shadow cursor">
  </div> 
                                            <?php  $serial++ ?>
                                           
                                            <!-- <td><img src="assets/images/gallery/<?php echo $row['picture']; ?>" width="100" height="100" alt=""></td> -->
                                            
                                          
                                       
                                    <?php } ?>

</div>

<div id="myModal12" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content12">
  <?php
                                    $sql12 = "select g.id as pid, g.name as picture FROM gallery as g inner join instruction as ins on
                                    ins.id=g.instruction_id ";
                                 
                                        
                                    $run12 = mysqli_query($my_connection, $sql12) or die("not connected");
                                    $serial1 = 1;
                                    while ($row1 = $run12->fetch_assoc()) {
                                      
                                         $serial1++;

                                    //   $picture =  $row['hotel_picture'];
                                    //   $location="gallery/".$picture;
                                 ?>
                                  <div class="mySlides12">
      <div class="numbertext12"><?php echo $serial1?></div>
      <img src="assets/images/gallery/<?php echo $row1['picture']; ?>" class="slideimages" style="width:100%">
    </div>
                                 
                                       
                                    <?php } ?>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next12" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>
<!-- below  -->
<?php               
$sql = "select g.id as pid,ins.name as pname, g.name as picture FROM gallery as g inner join instruction as ins on
ins.id=g.instruction_id";
                                    $run = mysqli_query($my_connection, $sql) or die("not connected");
                                    $serial = 1;
                                    while ($row = $run->fetch_assoc()) {
                                 ?>
<?php $pid=$row['pid'];?>
<?php $pname=$row['pname'];?>
<div class="column12">
      <img class="demo cursor belowimge" src="assets/images/gallery/<?php echo $row['picture']; ?>" style="width:100%" onclick="currentSlide(<?php echo $pid?>)" alt="<?php echo $pname?>">
    </div>                             
                                     
                                    <?php } ?>
<!-- below  -->

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
             

                <script>
function openModal() {
  document.getElementById("myModal12").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal12").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides12");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
    </body>
</html>

   



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  
  <script type="text/javascript" src="../jquery/js/jquery-1.9.0.min.js"></script>
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/doctor.css">
</head>

<body>
<nav>
        <a href="../index.php">Home</a>
        <a href="../db/alldisease.php">View All Diseases</a>
        <a href="searchdisease.php">Search for your Disease</a>
        <a href="doctors.php">Doctor</a>
        <a href="patient.php">Patient</a>
        <a href="">About Us</a>
        <a href="">Contact US</a>
        <a href="./doctor_panel.php?id=logout"> LOG OUT</a>
        
    </nav>
    <?php
session_start();
if($_SESSION['islogged']==false) {
  header("location:doctors.php"); 
  die(); 
}
   
    $x=$_GET['un'] ;

    $a=$_GET['id'];
    echo "<p id=name>$x</p>";
if($a=="logout"){
    logout();
}

   
function logout(){
session_destroy();
header("location:doctors.php"); 
}


?>
<div id="form">
<form action="" method="Post">
  <label class="heading">Add A new Disease</label>
  <input type="text" name="disease">
  <label class="heading">Enter its Symptoms seperated by comma</label>
  <input type="text" name="symptoms">
  <button type=Submit id="enter">Enter</button>
</form>

</div>
<?php
require("../db/database.php");
$db=new database();

if($_SERVER['REQUEST_METHOD']=='POST'){
  $disease=$_POST['disease'];
  $symptoms=$_POST['symptoms'];
  $symptom = explode(",", $symptoms);
  for ($i=0; $i <sizeof($symptom) ; $i++) { 
    $sql="INSERT INTO `diseases`(`disease`, `symptom`, `Weight`) VALUES ('$disease','$symptom[$i]','0') ";
    $db->insertdata($sql);
  }
}
?>


</body>

</html>




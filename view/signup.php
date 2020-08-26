<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  
  <script type="text/javascript" src="../jquery/js/jquery-1.9.0.min.js"></script>
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/index.css">
  
  
  <link rel="stylesheet" href="../css/login.css">

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
    </nav>

    <form  style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>User Name</b></label>
    <input type="text" placeholder="Enter username" name="username" required="yes">
<br>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" required="yes">
<br>
    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Repeat Password" name="pass" required="yes">
<br>
    <label for="spec"><b>Specialization</b></label>
    <input type="text" placeholder="Enter Specialization" name="spec" required="yes">
<br>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <input type="submit" value="Sign Up"/>
    </div>
  </div>
</form>
	


</body>

</html>

<?php
require_once("../db/database.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['username'])&& !empty($_POST['username'])){
      $username=$_POST['username'];
      $pass=$_POST['pass'];
      $name=$_POST['name'];
      $spec=$_POST['spec'];
      
    
      

      $sql = "INSERT INTO doctor(username, name, password, specialization)
      VALUES ('$username','$name','$pass','$spec')";
$db = new database();
$result=$db->insertdata($sql);

if($result){
    echo "<script type='text/javascript'>";
    echo "alert('Login successfully');";
    echo "</script>";
}
}



  }



?>


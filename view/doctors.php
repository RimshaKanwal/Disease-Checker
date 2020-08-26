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

    <form action="doctors.php" style="border:1px solid #ccc" method="POST">
  <div class="container">
    <h1>Login</h1>
    <p>Please fill in this form to create an account.</p>
<br>
    <label for="username"><b>User Name</b></label>
    <input type="text" placeholder="Enter username" name="username" required="yes">

    <br>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required="yes">

  <br>

    <div class="clearfix">
      <br>
      <input type="submit" value="Login"/>
      
      <label> OR <a href="./signup.php">Sign UP</a></label>
      
    </div>
  </div>
</form>
	



<?php
require_once("../db/database.php");
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['username'])&& !empty($_POST['username'])){
      $username=$_POST['username'];
      $pass=$_POST['pass'];
      
    
      

      $sql = "Select username,name,specialization,password from doctor where username='$username'AND password='$pass' ";
$db = new database();
$result=$db->fetchdata($sql);

while($row= $result->fetch()){
  
  if($username==$row['username'] && $pass=$row['password']){
    session_start();
    $_SESSION['islogged']=true;
    header('Location: ./doctor_panel.php?id=none&un='.$row['name']);
    
    
    
   
  }
  else{
    $_SESSION['islogged']=false;
    echo "<script type='text/javascript'>";
    echo "alert('Invalid Login');";
    echo "</script>";
  }
}



  }

}




?>


</body>

</html>
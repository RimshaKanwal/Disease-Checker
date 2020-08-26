<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/category.css">

</head>
<body>
<nav>
        <a href="../index.php">Home</a>
        <a href="alldisease.php">View All Diseases</a>
        <a href="../view/searchdisease.php">Search for your Disease</a>
        <a href="../view/doctors.php">Doctor</a>
        <a href="../view/patient.php">Patient</a>
        <a href="">About Us</a>
        <a href="">Contact US</a>
    </nav>
</body>
</html>
<?php
require("database.php");
$name=$_GET['name'];
    $sql="SELECT * FROM `category` where name='$name'";
    $db=new database();
   $result= $db->fetchdata($sql);
   echo"<h3>This Cateogory includes following diseases</h3>";

   while($row = $result->fetch()) {
       
      $a=$row['disease'];
       echo"<p> $a </p>";

   // echo "<br></a>";

}

?>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/index.css">

    <title>Document</title>
    <style>
    table{
        margin:1em;
    }
    
    </style>
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
    $sql="SELECT disease FROM `diseases` GROUP BY disease ";
    $db=new database();
    $data=array();
   $result= $db->fetchdata($sql);
   $i=0;
  //$json=array();
  echo"<table border=1>";
   while($row = $result->fetch()) {

        $data[$i]=$row['disease'];
        echo "<tr><td>$data[$i]</td></tr>";
        $i=$i+1;


}
echo "</table>";
//echo json_encode($json);
?>  
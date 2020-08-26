<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <title>Home</title>
</head>
<body>
    <nav>
        <a href="index.php">Home</a>
        <a href="./db/alldisease.php">View All Diseases</a>
        <a href="./view/searchdisease.php">Search for your Disease</a>
        <a href="./view/doctors.php">Doctor</a>
        <a href="./view/patient.php">Patient</a>
        <a href="">About Us</a>
        <a href="">Contact US</a>
    </nav>
   <img  id="main" src="./image/mainimage.jpg" alt="main image of logo">
<?php
require("./db/database.php");
$db=new database();
$sql="DROP TABLE IF EXISTS projectdisease.temp";
$db->insertdata($sql);
$sql="SELECT * FROM `category` ";
$result= $db->fetchdata($sql);
echo"<div class='image'>";

while($row = $result->fetch()) {
    $name=$row['name'];
    $disease=$row['disease'];
    $image=$row['image'];
    echo "<a href='./db/loaddisease.php?name=$name'><img id='test' src='$image'></a>";
}
echo"</div>";

?>

<footer class="footer-distributed">

<div class="footer-right">

  <a href="#"><i class="fa fa-facebook"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
  <a href="#"><i class="fa fa-github"></i></a>

</div>

<div class="footer-left">

  <p class="footer-links">
    <a href="#">Home</a>
    ·
    <a href="#">Blog</a>
    ·
    <a href="#">Pricing</a>
    ·
    <a href="#">About</a>
    ·
    <a href="#">Faq</a>
    ·
    <a href="#">Contact</a>
  </p>

  <p>WE CARE &copy; 2019</p>
</div>

</footer>

</body>
</html>
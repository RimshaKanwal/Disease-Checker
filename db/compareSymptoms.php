<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    <title>Document</title>
    <style>
    p{
        color:  white;
        font-size:30px;
    }
    </style>
</head>
<body>
    
</body>
</html>
<?php
$a=array();

require("database.php");
$db=new database();
$sql1="SELECT * FROM `temp`";
$result1= $db->fetchdata($sql1);

while($row = $result1->fetch()) {
    $sql="SELECT disease FROM `diseases` where symptom='$row[symptom]' ";
    $result= $db->fetchdata($sql);
    while($row1 = $result->fetch()) {
        array_push($a,$row1['disease']);
     }

}


$max = 0;
$max_item = $a[0];

$counts = array_count_values($a);
foreach ($counts as $value => $amount) {
    if ($amount > $max) {
        $max = $amount;
        $max_item = $value;
     //   echo "MAX VAL =".$max." ".$max_item;

    }
}
echo "<p >You may have $max_item</p>";

$sql="DROP TABLE IF EXISTS projectdisease.temp";
$db->insertdata($sql);

?>  
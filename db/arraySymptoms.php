<?php
require("database.php");
    $sql="SELECT symptom FROM `diseases`";
    $db=new database();
    $data=array();
   $result= $db->fetchdata($sql);
   $i=0;
  //$json=array();
   while($row = $result->fetch()) {
        $data[$i]=$row['symptom'];
        echo $data[$i].",";
        $i=$i+1;
  //  array_push($json, $row['symptom']);


}
//echo json_encode($json);
?>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/index.css">
    <script type="text/javascript" src="../jquery/js/jquery-1.9.0.min.js"></script>
    <!-- <script src="../EasyAutocomplete-1.3.5/jquery.easy-autocomplete.js"></script> 
        <script src="../EasyAutocomplete-1.3.5/jquery.easy-autocomplete.min.js"></script> 

        <link rel="stylesheet" href="../EasyAutocomplete-1.3.5/easy-autocomplete.min.css"> -->
        <script src="../jquery-ui-1.12.1.custom/jquery-ui.js"></script> 
    <script src="../jquery-ui-1.12.1.custom/jquery-ui.min.js"></script> 
    <link rel="stylesheet" href="../jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="../jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" href="../css/searchdisease.css">
    <title>Document</title>
</head>
<body >
<nav>
        <a href="../index.php">Home</a>
        <a href="../db/alldisease.php">View All Diseases</a>
        <a href="searchdisease.php">Search for your Disease</a>
        <a href="doctors.php">Doctor</a>
        <a href="patient.php">Patient</a>
        <a href="">About Us</a>
        <a href="">Contact US</a>
    </nav>

<form action="" method="post">
<label id="label">Enter your Symptoms</label>
        <input id="basics" name="val" class="easy-autocomplete.eac-blue" />
        <button id="submit" type="submit" >submit</button>
</form>
<button id="checkDisease" onclick="CheckDisease()"> Check disease </button>
<div id="result"></div>
<?php
require("../db/database.php");
$db=new database();

$sql="CREATE TABLE IF NOT EXISTS projectdisease.temp(
    symptom varchar(255)
    )";
$db->insertdata($sql);
if($_SERVER['REQUEST_METHOD']=='POST'){
    $cn=$_POST['val'];
    $sql="INSERT INTO `temp` (`symptom`) VALUES ('$cn')";
    $db->insertdata($sql);



}
?>
    <script> 
//list that is displayed in autopredict
    var options = {
	data: [],
	list: {
        match: {
        method: function(element, phrase) {
            if (element.search(phrase) === 0) {
            return true;
            } else {
            return false;
            }
        }
        },
       maxNumberOfElements: 10,
       
    
	}
};

    $.get("../db/arraySymptoms.php", function(string) {

        allSymptoms = string;
        var symptom = allSymptoms.split(",");
        var i=0
        for ( i = 0; i <symptom.length; i++) {
            options.data[i]=symptom[i];
          }
          var uniqueNames = [];
        $.each(options.data, function(i, el){
         if($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
            });
         $("#basics").autocomplete({source: uniqueNames});



});


// $("#basics").easyAutocomplete(options);
function CheckDisease() {
    $.get("../db/compareSymptoms.php", function(string) {
        $("#result").html(string);
    });

}
</script>
</body>
</html>
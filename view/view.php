<html>
<head>
<script type="text/javascript" src="../jquery/js/jquery-1.9.0.min.js"></script>

<script>
    $.get("../db/arraySymptoms.php", function(string) {
        $("#test").html(string);
    });
</script>
</head>
<body>
    <div id="test"></div>
</body>
</html> 

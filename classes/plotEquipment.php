<?php

 

//CONNECTING TO THE DATABASE
function getdb(){
	echo "in the getdb";
$servername = "localhost";
$username = "root";
$password = "";
$db = "cambeep";
//echo "called getDB";
 
try {
  
    $conn = mysqli_connect($servername, $username, $password, $db);
    }

catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

function plotEquipment(){
	echo "in the plot equpmnet()"

	$con = getdb();
    $Sql = "SELECT * FROM equipment";
    $result = mysqli_query($con, $Sql); 
    ?>

    <script>
    var myData  = [<?php 
while($info=mysqli_fetch_array($result))
    echo $info['f_data'].','; /* We use the concatenation operator '.' to add comma delimiters after each data value. */
?>];

var myLabels=[<?php 
while($info=mysqli_fetch_array($data))
    echo '"'.$info['f_name'].'",'; /* The concatenation operator '.' is used here to create string values from our database names. */
?>];
</script>

<?php
/* Close the connection */
$mysqli->close(); 


}
?>

window.onload=function(){
zingchart.render({
    id:"myChart",
    width:"100%",
    height:400,
    data:{
    "type":"bar",
    "title":{
        "text":"Data Pulled from MySQL Database"
    },
    "scale-x":{
        "labels":myLabels
    },
    "series":[
        {
            "values":myData
        }
]
}
});
};


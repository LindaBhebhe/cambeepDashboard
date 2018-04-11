
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";  //your database password
    $dbname = "cambeep";  //your database name

    $con = new mysqli($servername, $username, $password, $dbname);

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    else
    {
        //echo ("Connect Successfully");
    }
    $query = "SELECT item_name, quantity FROM equipment"; // select column
    $aresult = $con->query($query);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Massive Electronics</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
  
        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);
        function drawChart(){
            var data = new google.visualization.DataTable();
            var data = google.visualization.arrayToDataTable([
                ['item_name','quantity'],
                <?php
                    while($row = mysqli_fetch_assoc($aresult)){
                        echo "['".$row["item_name"]."', ".$row["quantity"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Date_time Vs Room Out Temp',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('areachart'));
            chart.draw(data, options);
        }

    </script>
</head>
<body>
     <div id="areachart" style="width: 1100px; height: 500px"></div>
</body>
</html>
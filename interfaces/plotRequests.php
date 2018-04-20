
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





    $date = date('Y-m-d H:i:s',time()-(7*86400)); // 7 days ago
    echo "date is";
    echo  $date;

    $query = "SELECT count(id) AS stationery_request FROM stationery_out where date <='$date'";
     // select column

    $query1 = "SELECT count(id) AS stationery_request FROM stationery_out where request_status ='sentc'";
    $aresult1 = $con->query($query1);

    $query2 = "SELECT count(id) FROM borrowed_equipment where status ='sent'"; // select column
    $aresult2 = $con->query($query2);
    $query3 = "SELECT count(id) FROM user_support where status ='pending'"; // select column
    $aresult3 = $con->query($query3);

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
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

                   $data = mysqli_fetch_assoc($aresult1);
                        echo "['stationery', ".$data['stationery_request']."],";
                    

                    while($row = mysqli_fetch_assoc($aresult2)){
                        echo "['equipment', ".$row["count(id)"]."],";
                    }

                    while($row = mysqli_fetch_assoc($aresult3)){
                        echo "['support', ".$row["count(id)"]."],";
                    }
                ?>
               ]);

            var options = {
                title: 'Pending requests',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('areachart'));
            chart.draw(data, options);
        }

    </script>
</head>
<body>
     <div id="areachart" style="width: 1000px; height: 300px"></div>
</body>
</html>
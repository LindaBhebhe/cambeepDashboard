
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
    $query = "SELECT item_name, quantity FROM equipment"; 
    $sth = $con->query($query);


    $flag = true;
    $table = array();
    $table['cols'] = array(

    // Labels for your chart, these represent the column titles
    // Note that one column is in "string" format and another one is in "number" format as pie chart only required "numbers" for calculating percentage and string will be used for column title
    array('label' => 'item_name', 'type' => 'string'),
    array('label' => 'quantity', 'type' => 'number')

);

$rows = array();
while($r = mysqli_fetch_assoc($sth)) {
    $temp = array();
    // the following line will be used to slice the Pie chart
    $temp[] = array('v' => (string) $r['item_name']); 

    // Values of each slice
    $temp[] = array('v' => (int) $r['quantity']); 
    $rows[] = array('c' => $temp);
}

$table['rows'] = $rows;
$jsonTable = json_encode($table);

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/jpg" href="../assets/img/Camfed-Logo.jpg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>CamBeep Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>




     <!--Load the Ajax API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

    <script type="text/javascript">

    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChart2);

    function drawChart2() {

      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
           title: 'All Equipment',
          is3D: 'true',
          width: 1000,
          height: 1100
        };
      // Instantiate and draw our chart, passing in some options.
      // Do not forget to check your div ID
      var chart = new google.visualization.PieChart(document.getElementById('chart_div2'));
      chart.draw(data, options);
    }
    </script>




</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="http://www.camfed.org" class="simple-text">
                  CamBeep
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                      <a href="dashboard.php">
                      <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./user.php">
                            <i class="material-icons">person</i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="./viewSupport.php">
                            <i class="material-icons">content_paste</i>
                            <p>Support Requests</p>
                        </a>
                    </li>
                    <li>
                        <a href="./viewStationery.php">
                            <i class="material-icons">content_paste</i>
                            <p>Stationery Requests</p>
                        </a>
                    </li>
                    <li>
                        <a href="./viewEquipment.php">
                            <i class="material-icons">content_paste</i>
                            <p>Equipment Requests</p>
                        </a>
                    </li>
                    <li>
                        <a href="./allStationery.php">
                            <i class="material-icons">content_paste</i>
                            <p>Add Stationery</p>
                        </a>
                    </li>
                    <li>
                        <a href="./allEquipment.php">
                            <i class="material-icons">content_paste</i>
                            <p>Add Equipment</p>
                        </a>
                    </li>
                    <li>
                        <a href="./notifications.php">
                            <i class="material-icons text-gray">notifications</i>
                            <p>Notifications</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> CamBeep Dashboard </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">2</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Equipment running out: 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Urgent requests: 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Stationery</p>
                                    
                                    <h3 class="title">

                                    10
                                        <small></small>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       
                        
                                        <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                   <i class="material-icons">content_copy</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Support</p>
                                    <h3 class="title">3</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                              <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                   
                                     <i class="material-icons">content_copy</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">equipment</p>
                                    <h3 class="title">5</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                         <i class="material-icons">update</i> Just Updated
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Pending Stationery Requests</p>
                                    <h3 class="title">4</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                     <i class="material-icons text-danger">warning</i>
                                       <a href="#pablo">View...</a>
                                    </div>
                                </div>
                            </div>
                        </div>





                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Pending Support Requests</p>
                                    <h3 class="title">2</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                     <i class="material-icons text-danger">warning</i>
                                       <a href="#pablo">View...</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                           <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="red">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Pending Equipment Requests</p>
                                    <h3 class="title">1</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                     <i class="material-icons text-danger">warning</i>
                                       <a href="#pablo">View...</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Lost equipment</p>
                                    <h3 class="title">5</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                     <i class="material-icons text-danger">warning</i>
                                       <a href="#pablo">View...</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                          <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">info_outline</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Overdue Equipment</p>
                                    <h3 class="title">4</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                     <i class="material-icons text-danger">warning</i>
                                       <a href="#pablo">View...</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                     <div class="content" id="chart_div2" >
                        
                   
                    </div>


                    <div class="content" id="chart_div" >

                    <?php
                    Require('plotStationery.php');
                    ?>

                    </div>
                  

                    <div class="content" id="areachart" >
                        
                    <?php
                    #Require('plotStationery.php');
                    ?>
                    </div> 

                    

                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.camfed.org">Camfed Zim</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>


</html>
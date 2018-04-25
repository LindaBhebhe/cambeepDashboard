


 <script type="text/javascript" src="../controller/script.js"></script>
 <?php

//CONNECTING TO THE DATABASE
function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "cambeep";
//echo "called getDB";
 
try {
  
    $conn = mysqli_connect($servername, $username, $password, $db);
    // echo "Connected successfully"; 
    }

catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

 function loadEquipment($item) {
  echo "in the load equipment function";
    $con= getdb();
    $Sql ="Select item_id, item_name,specs from equipment where item_name = '$item'";
    $result = mysqli_query($con, $Sql); 


    if (mysqli_num_rows($result)>0 ) {
       while($row = mysqli_fetch_assoc($result)){  
            echo "<option value=".$row['specs']. "></option>";
        }
    }
}


// Function to get the IT support reports 
function get_all_support_requests(){
  
    $con = getdb();
    $Sql = "SELECT * FROM user_support";
    $result = mysqli_query($con, $Sql);  

   
    if (mysqli_num_rows($result)>0 ) {

    	  echo "<div class='table-responsive'>
    	  			<table id='myTable' class='table table-striped table-bordered'>
                         <thead>
                          <th>Date</th>
                          <th>Requester</th>
                          <th>Message</th>
                          <th>Status</th>
                          <th>State</th>
                          <th>Viewed</th>
                          <th>Respond</th>
                        </tr></thead><tbody>";
    
 
           echo "<tbody>"; 
           $row_id = 0; 
      while($row = mysqli_fetch_assoc($result)){ 
         $row_id =  $row_id+1;
       echo "<tr id= '$row_id'>
             <td>" . $row['date'] .
             "</td><td>" . $row['sender'] .
             "</td><td>" . $row['message'] .
              "</td><td>" . $row['status']. 
              "</td><td>" . $row['state']. 
              "</td>
              <td>";
          echo'
              <form name="view" method="GET" action = "">
               <button name="done" type="submit" id= $row_id class="btn btn-primary"  onclick="removeRow('.$row_id.')">Complete</button> 
               </form>';

              ?>
               
              <script type="text/javascript" src="../Controller/controlScript.js"></script> 
              
               <?php  
                 echo "</td>";
                 echo "<td>";
                 ?>

                <form name="respond" method="GET" action = "viewedUpdate.php">
               <button name="respond" type="submit" id="doneBtn" class="btn btn-primary"  onclick="cancelRequest()" >Respond</button> 
               </form>
               <?php  
                echo "</td>";

}
echo "</tbody>";
mysqli_close($con);                         
     echo "</table></div>";
     
}
 else {
     echo "you have no records";
}
}


// Function to view all the stationery requests
function get_all_stationery_requests(){
  
    $con = getdb();
    $Sql = "SELECT * FROM stationery_out";
    $result = mysqli_query($con, $Sql);  

   
    if (mysqli_num_rows($result)>0 ) {

    	  echo "<div class='table-responsive'>
    	  			<table id='myTable' class='table table-striped table-bordered'>
                         <thead>
                          <th>Date</th>
                          <th>By</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Collection_by</th>
                        
                          <th>Check-out</th>
                        </tr></thead><tbody>";
    
           echo "<tbody>";  
            while($row = mysqli_fetch_assoc($result)){ 

            $item_id = $row['item_id'];

            $sql2 = "SELECT item_name FROM stationery WHERE id = '$item_id' ";
            $result2 = mysqli_query($con, $sql2); 

            while($row2 = mysqli_fetch_assoc($result2)) 

        echo "<tr>
                   <td>" . $row['request_date'] .
              "</td><td>" . $row['request_by'] .
              "</td><td>" . $row2['item_name'] .
              "</td><td>" . $row['quantity'] .
              "</td><td>" . $row['collection_by'] .
              "</td>
              <td>";

              
             


              echo'

                            <a class="delete" onclick="getdisId(this.id)" id="'.$row['id'].'"data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>';

             /* ?>

              <form name="rem" method="GET" action = "rem.php">
               <input  name="rem" id="rem" type="text" tabindex="1"  required>
               </form>

               <?php  
                 echo "</td>";
                 echo "<td>";
                 ?>

                <form name="clear" method="GET" action = "clear.php">
               <button name="clear" type="submit" id="'.$row['id'].' onclick="clear()" >Clear</button> 
               </form>
               <?php */ 
                echo "</td>";

}
echo "</tbody>";
mysqli_close($con);                         
     echo "</table></div>";
     
}
 else {
     echo "you have no records";
}
}


function  get_all_stationery_requests_for_approval(){

    $user = $_SESSION['username'];
   
    $con = getdb();
    //$Sql = "SELECT * FROM stationery_out WHERE approver = '$user'";
        $Sql = "SELECT * FROM stationery_out WHERE approver = 'P Jamu'";
    $result = mysqli_query($con, $Sql);  

   
    if (mysqli_num_rows($result)>0 ) {

        echo "<div class='table-responsive'>
              <table id='myTable' class='table table-striped table-bordered'>
                         <thead>
                          <th>Date</th>
                          <th>By</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Collection_by</th>
                          <th>Approve</th>
                        </tr></thead><tbody>";
    
           echo "<tbody>";  
            while($row = mysqli_fetch_assoc($result)){ 

            $item_id = $row['item_id'];

            $sql2 = "SELECT item_name FROM stationery WHERE id = '$item_id' ";
            $result2 = mysqli_query($con, $sql2); 

            while($row2 = mysqli_fetch_assoc($result2)) 

        echo "<tr>
                   <td>" . $row['request_date'] .
              "</td><td>" . $row['request_by'] .
              "</td><td>" . $row2['item_name'] .
              "</td><td>" . $row['quantity'] .
              "</td><td>" . $row['collection_by'] .
              "</td>
              <td>";

              
             


              echo'

                            <a class="delete" onclick="getApproveId(this.id)" id="'.$row['id'].'"data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        </td>
                    </tr>';

             /* ?>

              <form name="rem" method="GET" action = "rem.php">
               <input  name="rem" id="rem" type="text" tabindex="1"  required>
               </form>

               <?php  
                 echo "</td>";
                 echo "<td>";
                 ?>

                <form name="clear" method="GET" action = "clear.php">
               <button name="clear" type="submit" id="'.$row['id'].' onclick="clear()" >Clear</button> 
               </form>
               <?php */ 
                echo "</td>";

}
echo "</tbody>";
mysqli_close($con);                         
     echo "</table></div>";
     
}
 else {
     echo "You have no requests for approval";
}


}








// Function to view all the equipment requests
function get_all_equipment_requests(){
  
    $con = getdb();
    $Sql = "SELECT * FROM borrowed_equipment WHERE status ='pending'";
    $result = mysqli_query($con, $Sql);  

   
    if (mysqli_num_rows($result)>0 ) {

        echo "<div class='table-responsive'>
              <table id='myTable' class='table table-striped table-bordered'>
                         <thead>
                          <th>Date</th>
                          <th>By</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Collection_date</th>
                          <th>Return_date</th>
                          <th>Rem</th>
                          <th>Clear</th>
                        </tr></thead><tbody>";
    
           echo "<tbody>";  
            while($row = mysqli_fetch_assoc($result)){ 

            $item_id = $row['item_id'];
                     $sql2 = "SELECT item_name FROM equipment WHERE item_id = '$item_id' ";
            $result2 = mysqli_query($con, $sql2); 

            while($row2 = mysqli_fetch_assoc($result2)) 

        echo "<tr>
                   <td>" . $row['request_date'] .
              "</td><td>" . $row['borrowed_by'] .
              "</td><td>" . $row2['item_name'] .
              "</td><td>" . $row['quantity'] .
              "</td><td>" . $row['collection_date'] .
              "</td><td>" . $row['return_date'] .
              "</td>
              <td>"
              ?>

              <form name="rem" method="GET" action = "rem.php">
               <input  name="rem" id="rem" type="text" tabindex="1"  required>
               </form>

               <?php  
                 echo "</td>";
                 echo "<td>";
                 ?>

                <form name="clear" method="GET" action = "clear.php">
               <button name="clear" type="submit" id="clearBtn" class="btn btn-primary"  onclick="Complete()" >Clear</button> 
               </form>
               <?php  
                echo "</td>";

}
echo "</tbody>";
mysqli_close($con);                         
     echo "</table></div>";
     
}
 else {
     echo "you have no records";
}
}


function get_all_stationery(){
  
    $con = getdb();
    $Sql = "SELECT * FROM stationery";
    $result = mysqli_query($con, $Sql);  

   
    if (mysqli_num_rows($result)>0 ) {

        echo "<div class='table-responsive'>
              <table id='myTable' class='table table-striped table-bordered'>
                         <thead>
                          <th>Date</th>
                          <th>Item</th>
                          <th>Quantity</th>
                          <th>Received_by</th>
                    
                        </tr></thead><tbody>";
    
           echo "<tbody>";  
            while($row = mysqli_fetch_assoc($result)){ 

            


        echo "<tr>
                   <td>" . $row['date_in'] .
              "</td><td>" . $row['item_name'] .
              "</td><td>" . $row['quantity'] .
              "</td><td>" . $row['received_by'] .
              "</td>
              <td>";
             
                echo "</td>";

}
echo "</tbody>";
mysqli_close($con);                         
     echo "</table></div>";
     
}
 else {
     echo "you have no records";
}
}



function get_all_equipment(){
  
    $con = getdb();
    $Sql = "SELECT * FROM equipment ";
    $result = mysqli_query($con, $Sql);  

   
    if (mysqli_num_rows($result)>0 ) {

        echo "<div class='table-responsive'>
              <table id='myTable' class='table table-striped table-bordered'>
                         <thead>
                          <th>Date</th>
                          <th>Item</th>
                          <th>Specs</th>
                          <th>Quantity</th>
                          <th>Received_by</th>
                    
                        </tr></thead><tbody>";
    
           echo "<tbody>";  
            while($row = mysqli_fetch_assoc($result)){ 

            


        echo "<tr>
                   <td>" . $row['date_in'] .
              "</td><td>" . $row['item_name'] .
              "</td><td>" . $row['specs'] .
              "</td><td>" . $row['quantity'] .
              "</td><td>" . $row['received_by'] .
              "</td>
              <td>";
             
                echo "</td>";

}
echo "</tbody>";
mysqli_close($con);                         
     echo "</table></div>";
     
}
 else {
     echo "you have no records";
}
}



?>

<?php

header("Access-Control-Allow-Origin: *");

if(isset($_REQUEST['id'])){
  echo "in the checkOutStationery ";

   $con= mysqli_connect("localhost","root","","cambeep");

    if($con){ 
      echo "established connection";
   
     $id= $_REQUEST['id'];
     echo "id ";
     echo $id;
   
      $sql = "UPDATE stationery_out SET approval_status ='yes' WHERE id = '$id'";
      $result = mysqli_query($con, $sql);  


    if($result){
      return "successful";
    }
   }
  }
 

 ?>


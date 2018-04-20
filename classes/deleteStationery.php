<?php

header("Access-Control-Allow-Origin: *");
echo "in the sendEquip php file";

if(isset($_REQUEST['id'])){
  $id = $_REQUEST['id'];
  echo $id;

   $con= mysqli_connect("localhost","root","","cambeep");

    if($con){ 
      echo "established connection";

      $sql ="DELETE FROM stationery WHERE id = '$id'";
      echo("deleted");
      $result = mysqli_query($con, $sql);  


    if($result){
      return "successful";
    }
  }
 }

 ?>
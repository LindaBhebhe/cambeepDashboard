<?php

header("Access-Control-Allow-Origin: *");
echo "in the sendEquip php file";

if(isset($_REQUEST['item'])){

   $con= mysqli_connect("localhost","root","","cambeep");

    if($con){ 
      echo "established connection";
   
   // session_start();
   // $user = $_SESSION['username'];
    $user = "Bhebhe";
    $date  = date('Y/m/d H:i:s');
    $item = $_REQUEST['item'];
    $quantity = $_REQUEST['quantity'];
    $status ="pending";

   
    echo "about to insert";+
    console.log("about to insert");
    console.log($item);
    $item2= marker;
    $quantity2 = 90;

      $sql ="INSERT INTO stationery(item_name,quantity, date_in, received_by) VALUES ('$item','$quantity','$date','$user')";
      echo("inserted");
      $result = mysqli_query($con, $sql);  


    if($result){
      return "successful";
    }
  }
 }




 ?>

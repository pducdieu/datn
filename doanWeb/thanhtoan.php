<?php
if(!isset($_SESSION))
{
    session_start();
}
include './connect_db.php';
$payment='tt';
      echo $payment; 
    
//header("Location:  http://sandbox.vnpayment.vn/tryitnow/Home/CreateOrder");

?>

<?php
ob_start(); // Turns on output buffering
session_start(); 

$timezone = date_default_timezone_set("Europe/London");
                                                               //starts session varibles
$con = mysqli_connect("localhost", "root", "", "hack");

if(mysqli_connect_errno())
{
  echo "failed to connect: " . mysqli_connect_errno();
}


?>
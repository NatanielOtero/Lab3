<?php

session_start();

if(!isset($_SESSION["Usuario"]))
{
  //echo "error";
  header("location:./Register.php");
}



 ?>

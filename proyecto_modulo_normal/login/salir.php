<?php 
 session_start();

 unset($_SESSION['usern']);
 header("location:../index.php");

 ?>
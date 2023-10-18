<?php
   session_start();
   if(!isset($_SESSION['idUser'])){
      header("location:login.php");
      die();
   }
?>
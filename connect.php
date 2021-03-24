<!-- DB connection file -->
<?php
  $connect = mysqli_connect("localhost", "root", "", "PeoplesCity");

  if(!$connect){
    die("Connection failed: " .mysqli_connect_error());
  }
?>

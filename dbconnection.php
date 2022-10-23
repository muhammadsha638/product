<?php
$servername="localhost";
$username="root";
$password="";
$database="product";
$connect=mysqli_connect ($servername,$username,$password,$database);
       if (!$connect){
        die ("failed".mysqli_connect_error());
       }
       ?>
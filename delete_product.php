<?php
include_once("dbconnection.php");
$id=$_GET['productid'];
$sql="DELETE FROM product_datails WHERE product_id='$id'";
    
    if(mysqli_query($connect,$sql)){
        Print '<script>alert("deleted sucessfully");</script>';
                Print '<script>window.location.assign("view_product.php");</script>'; 
        }else{
                Print '<script>alert(" something problem ");</script>';
                Print '<script>window.location.assign("view_product.php");</script>'; 
                
   }
?>
<?php
include_once("dbconnection.php");
$totalproduct_inpage = 2;

$sql="SELECT * FROM product_datails ORDER BY product_id DESC;";
$result=mysqli_query($connect,$sql);
$numrows = mysqli_num_rows($result);
$total_number_ofpage = ceil ($numrows / $totalproduct_inpage); 
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  
$pageresult = ($page-1) * $totalproduct_inpage;
$sql1 = "SELECT *FROM product_datails LIMIT " . $pageresult . ',' . $totalproduct_inpage;  
$result1 = mysqli_query($connect, $sql1);  

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="table-responsive ">
  <table class="table table-bordered">
   <thead>
    <th>Sl.no</th>
    <th>Product Image</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Description</th>
    <th>Action</th>
   </thead>
   <tbody>
  
    <?php
         $i='1';                                                         
    if(mysqli_num_rows($result1)>0){
       while($row=mysqli_fetch_array($result1))
       {
                                                        
    ?>
     <tr>
     <td><?php echo $i++;?></td>
     <td><img src="productimages/<?php echo $row['product_image'];?>" style="width:30%"></td>
     <td><?php echo $row['product_name'];?></td>
     <td><?php echo $row['price'];?></td>
     <td><?php echo $row['product_details'];?></td>
     <td>
        <a href="edit_product.php?productid=<?php echo $row['product_id'];?>" class="btn btn-info">Edit</a>
        <a href="delete_product.php?productid=<?php echo $row['product_id'];?>" class="btn btn-danger">Delete</a>
     </td>
       </tr>
     <?php
     }
    }
    else
    {
        ?>
        <tr>
            <td>No Records</td>
        </tr>
       <?php
    }
    ?>
   </tbody>
  </table>
 
</div>

</div>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <center>
<?php
  for($page = 1; $page<= $total_number_ofpage; $page++) {  
    echo '<a href = "view_product.php?page=' . $page . '" style="padding: 5px;">' . $page . ' </a>';  
}  
?>
</center>
</div>
</div>
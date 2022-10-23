<?php
include_once("dbconnection.php");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Product Name</label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <input type="text" name="pname" id="pname" class="form-control" placeholder="Product name">
    </div>
</div>

<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Product Price</label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <input type="text" name="price" id="price" class="form-control" placeholder="Product price">
    </div>
</div>

<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Product Description</label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
    </div>
</div>

<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Product Image</label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <input type="file" name="productimage" id="productimage" class="form-control" placeholder="Product Image">
    </div>
</div>

<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <center>
    <button class="btn btn-primary" name="submit">Submit</button>
    </center>
    </div>
</div>
</form>    
</div>
<?php
if(isset($_POST['submit']))
{
    $productname=$_POST['pname'];
    // $productname =mysqli_real_escape_string($connect,$_POST['pname']);
    $price=$_POST['price'];
    $productdescription=$_POST['description'];
    

    $imgname =$_FILES['productimage'] ['name'];
    $temp_img_name =$_FILES['productimage'] ['tmp_name'];
    $folder ='productimages/'.$imgname;
    move_uploaded_file($temp_img_name,$folder);

    $date=date('d-m-Y');
    $sql="INSERT INTO `product_datails` (`product_name`, `price`, `product_details`, `product_image`, `date`, `STATUS`) VALUES ('$productname','$price','$productdescription','$imgname','$date','1')";
    if(mysqli_query($connect,$sql)){
        Print '<script>alert("product sucessfully added");</script>';
                Print '<script>window.location.assign("view_product.php");</script>'; 
        }else{
                Print '<script>alert("something problem!!!!!!!...... Cant add ");</script>';
                Print '<script>window.location.assign("add_product.php");</script>'; 
               
                
    }
}
?>
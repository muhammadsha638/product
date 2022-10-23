<?php
include_once("dbconnection.php");
$id=$_GET['productid'];
$sql="SELECT * FROM product_datails Where product_id ='$id';";
$result=mysqli_query($connect,$sql);
foreach($result as $row)
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<div class="container">
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Product Name</label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <input type="text" name="pname" id="pname" class="form-control" placeholder="Product name" value="<?php echo $row['product_name'];?>">
    </div>
</div>

<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Product Price</label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <input type="text" name="price" id="price" class="form-control" placeholder="Product price" value="<?php echo $row['price'];?>">
    </div>
</div>

<div class="form-group row">
    <label  class="col-lg-12 col-md-12 col-sm-12 col-xs-12">Product Description</label>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <textarea name="description" id="description" class="form-control" placeholder="Description">
    <?php echo $row['product_details'];?>
    </textarea>
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
    <button class="btn btn-primary" name="update">Update</button>
    </center>
    </div>
</div>
</form>    
</div>

<?php
if(isset($_POST['update']))
{
    $productname=$_POST['pname'];
    $price=$_POST['price'];
    $productdescription=$_POST['description'];
    
    $imgname =$_FILES['productimage'] ['name'];

    if($imgname == null)
    {
    
    $sql="UPDATE `product_datails` SET `product_name`='$productname',`price`='$price',`product_details`='$productdescription' WHERE `product_id`='$id' ";
    if(mysqli_query($connect,$sql)){
        Print '<script>alert("product sucessfully added");</script>';
                Print '<script>window.location.assign("view_product.php");</script>'; 
        }else{
               Print '<script>alert("something problem!!!!!!!...... Cant add ");</script>';
               Print '<script>window.location.assign("edit_product.php?productid=<?php echo $id;?>");</script>'; 
                   
    }
}
    else{


   
    $temp_img_name =$_FILES['productimage'] ['tmp_name'];
    $folder ='productimages/'.$imgname;
    move_uploaded_file($temp_img_name,$folder);


    $sql="UPDATE `product_datails` SET `product_name`='$productname',`price`='$price',`product_details`='$productdescription',`product_image`='$imgname' WHERE `product_id`='$id' ";
    if(mysqli_query($connect,$sql)){
        Print '<script>alert("product sucessfully added");</script>';
                Print '<script>window.location.assign("view_product.php");</script>'; 
        }else{
                Print '<script>alert("something problem!!!!!!!...... Cant add ");</script>';
                Print '<script>window.location.assign("edit_product.php?productid=<?php echo $id;?>");</script>'; 
               
                
    }

    }
}
?>

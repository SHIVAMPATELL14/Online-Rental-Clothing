<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

//For Adding Products
if(isset($_POST['submit']))
{
    $gender=$_POST['gender'];
    $category=$_POST['category'];
    $subcat=$_POST['subcategory'];
    $title=$_POST['title'];
    $productcode=$_POST['productcode'];
    $size=$_POST['size'];
   
    $materials=$_POST['materials'];
    $color=$_POST['color'];
    $productdescripton=addslashes($_POST['productdescripton']);
    $tandc=addslashes($_POST['tandc']);
    $priceperday=$_POST['priceperday'];
    $securityamt=$_POST['securityamt'];
    $shippingcharge=$_POST['shippingcharge'];
    $image1=$_FILES["image1"]["name"];
    $image2=$_FILES["image2"]["name"];
    $image3=$_FILES["image3"]["name"];
$extension1 = substr($image1,strlen($image1)-4,strlen($image1));
$extension2 = substr($image2,strlen($image2)-4,strlen($image2));
$extension3 = substr($image3,strlen($image3)-4,strlen($image3));
//Renaming the  image file
$imgnewfile1=md5($image1.time()).$extension1;
$imgnewfile2=md5($image2.time()).$extension2;
$imgnewfile3=md5($image3.time()).$extension3;
$addedby=$_SESSION['aid'];


    move_uploaded_file($_FILES["image1"]["tmp_name"],"productimages/".$imgnewfile1);
    move_uploaded_file($_FILES["image2"]["tmp_name"],"productimages/".$imgnewfile2);
    move_uploaded_file($_FILES["image3"]["tmp_name"],"productimages/".$imgnewfile3);
    
$sql=mysqli_query($con,"insert into tblrentalcloth(Gender,Category,SubCategory,Title,ProductCode,Size,Materials,Color,ProductDescription,TermandCond,Priceperday,SecurityAmount,ShippingCharge,Image1,Image2,Image3,addedBy) values('$gender','$category','$subcat','$title','$productcode','$size','$materials','$color','$productdescripton','$tandc','$priceperday','$securityamt','$shippingcharge','$imgnewfile1','$imgnewfile2','$imgnewfile3','$addedby')");
if($sql){
echo "<script>alert('Product Added successfully');</script>";
echo "<script>window.location.href='add-product.php'</script>";
} else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='add-product.php'; </script>";   
}
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>OCRS | Add Cloths Details</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
   <script>
function getSubcat(val) {
    $.ajax({
    type: "POST",
    url: "get_subcat.php",
    data:'cat_id='+val,
    success: function(data){
        $("#subcategory").html(data);
    }
    });
}
</script>   

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Cloth Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Cloth Details</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
<form  method="post" enctype="multipart/form-data">    
<div class="row">
<div class="col-3" style="font-weight: bold;">Gender</div>
<div class="col-7">
<select name="gender" id="gender" class="form-control" onChange="getSubcat(this.value);" required>
<option value="">Select Gender</option> 

<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Boys">Boys</option>
<option value="Girls">Girls</option>

</select>    
</div>
</div>                            
<div class="row"  style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Category Name</div>
<div class="col-7">
<select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['id'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Sub Category name</div>
<div class="col-7"><select   name="subcategory"  id="subcategory" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Title</div>
<div class="col-7"><input type="text"    name="title"  placeholder="Enter Title" class="form-control" required>

</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Product Code</div>
<div class="col-7"><input type="text"    name="productcode"  placeholder="Enter Product Code" class="form-control" required>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Size</div>
<div class="col-7"><select name="size" id="size" class="form-control"  required>
<option value="">Select Size</option> 

<option value="XS">XS</option>
<option value="S">S</option>
<option value="L">L</option>
<option value="M">M</option>
<option value="XL">XL</option>
<option value="2XL">2XL</option>
<option value="3XL">3XL</option>
<option value="Free Size">Free Size</option>
</select> 

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Materials</div>
<div class="col-7"><input type="text"    name="materials"  placeholder="Enter Material of Cloth" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Color</div>
<div class="col-7"><input type="text"    name="color"  placeholder="Enter Color of Cloth" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Product Description</div>
<div class="col-7"><textarea name="productdescripton"  placeholder="Product Description" class="form-control" required></textarea>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Term and Condition</div>
<div class="col-7"><textarea name="tandc"  placeholder="Term and Condition" class="form-control" required></textarea>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Price Per Day</div>
<div class="col-7"><input type="text"    name="priceperday"  placeholder="Enter Rental Price" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Security Amount</div>
<div class="col-7"><input type="text"    name="securityamt"  placeholder="Enter Security Amount" class="form-control" required>

</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Shipping Charge</div>
<div class="col-7"><input type="text"    name="shippingcharge"  placeholder="Enter  Shipping Charge" class="form-control" required>
</select>
</div>
</div>



<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Featured Image</div>
<div class="col-7"><input type="file" name="image1" id="image1"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Image 2</div>
<div class="col-7"><input type="file" name="image2"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Image 3</div>
<div class="col-7"><input type="file" name="image3"  class="form-control" accept="image/*" title="Accept images only" required>
</div>
</div>

<div class="row" style="margin-top:1%">
    <div class="col-3">&nbsp;</div>
<div class="col-3"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
</div>

</form>
                            </div>
                        </div>
                    </div>
                </main>
          <?php include_once('includes/footer.php');?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
<?php } ?>

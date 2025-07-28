<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Adding Products
if(isset($_POST['submit']))
{

    $pid=intval($_GET['id']);
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
    $updatedby=$_SESSION['aid'];

$sql=mysqli_query($con,"update tblrentalcloth set Gender='$gender', category='$category',subCategory='$subcat',Title='$title',ProductCode='$productcode',Size='$size',Materials='$materials', Color='$color',ProductDescription='$productdescripton',TermandCond='$tandc',Priceperday='$priceperday',SecurityAmount='$securityamt',shippingCharge='$shippingcharge',lastUpdatedBy ='$updatedby' where ID='$pid'");
echo "<script>alert('Product details updated successfully');</script>";
echo "<script>window.location.href='manage-rental-cloth.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>OCRS | Rental Cloth Updations</title>
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
                        <h1 class="mt-4">Edit Cloth Details</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Cloth Details</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select tblrentalcloth.ID as pid,tblrentalcloth.Image1,tblrentalcloth.Image2,tblrentalcloth.Image3,tblrentalcloth.Title,category.categoryName,subcategory.subcategoryName as subcatname,tblrentalcloth.CreationDate,tblrentalcloth.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,tblrentalcloth.Title,tblrentalcloth.ProductCode,tblrentalcloth.Size,tblrentalcloth.Materials,tblrentalcloth.Color,tblrentalcloth.ProductDescription,tblrentalcloth.TermandCond,tblrentalcloth.Gender,tblrentalcloth.Priceperday ,tblrentalcloth.SecurityAmount,tblrentalcloth.ShippingCharge from tblrentalcloth join subcategory on tblrentalcloth.SubCategory=subcategory.id join category on tblrentalcloth.Category=category.id join tbladmin on tbladmin.id=tblrentalcloth.addedBy where  tblrentalcloth.ID='$pid' order by pid desc");
while($row=mysqli_fetch_array($query))
{
?>                                 
<form  method="post" enctype="multipart/form-data">  
<div class="row">
<div class="col-3" style="font-weight: bold;">Gender</div>
<div class="col-7">
<select name="gender" id="gender" class="form-control" required>
<option value="<?php echo htmlentities($row['Gender']);?>"><?php echo htmlentities($row['Gender']);?></option> 

<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Boys">Boys</option>
<option value="Girls">Girls</option>

</select>    
</div>
</div>                                
<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Category Name</div>
<div class="col-7">
<select name="category" id="category" class="form-control" onChange="getSubcat(this.value);" required>
<option value="<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['categoryName']);?></option> 
<?php $ret=mysqli_query($con,"select * from category");
while($result=mysqli_fetch_array($ret))
{?>

<option value="<?php echo $result['id'];?>"><?php echo $result['categoryName'];?></option>
<?php } ?>
</select>    
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Sub Category name</div>
<div class="col-7"><select   name="subcategory"  id="subcategory" class="form-control" required>
    <option value="<?php echo htmlentities($row['subid']);?>"><?php echo htmlentities($row['subcatname']);?>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Title</div>
<div class="col-7"><input type="text" name="title"  value="<?php echo htmlentities($row['Title']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Product Code</div>
<div class="col-7"><input type="text" name="productcode"  value="<?php echo htmlentities($row['ProductCode']);?>" class="form-control" required>
</select>
</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Size</div>
<div class="col-7"><select name="size" id="size" class="form-control" required>
<option value="<?php echo htmlentities($row['Size']);?>"><?php echo htmlentities($row['Size']);?></option> 
Size
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
<div class="col-7"><input type="text" name="materials" class="form-control" required value="<?php echo htmlentities($row['Materials']);?>">

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Color</div>
<div class="col-7"><input type="text" name="color" value="<?php echo htmlentities($row['Color']);?>" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Product Description</div>
<div class="col-7"><textarea name="productdescripton"  placeholder="Product Description" class="form-control" required><?php echo htmlentities($row['ProductDescription']);?></textarea>

</div>
</div>
<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Term and Condition</div>
<div class="col-7"><textarea name="tandc"  class="form-control" required><?php echo htmlentities($row['TermandCond']);?></textarea>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Price Per Day</div>
<div class="col-7"><input type="text"    name="priceperday" value="<?php echo htmlentities($row['Priceperday']);?>" class="form-control" required>

</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Security Amount</div>
<div class="col-7"><input type="text" name="securityamt"  value="<?php echo htmlentities($row['SecurityAmount']);?>" class="form-control" required>

</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Shipping Charge</div>
<div class="col-7"><input type="text" name="shippingcharge"  value="<?php echo htmlentities($row['ShippingCharge']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Product Featured Image</div>
<div class="col-7"><img src="productimages/<?php echo htmlentities($row['Image1']);?>" width="250"><br />
    <a href="change-image1.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Product Image 2</div>
<div class="col-7"><img src="productimages/<?php echo htmlentities($row['Image2']);?>" width="250"><br />
    <a href="change-image2.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-3" style="font-weight: bold;">Product Image 3</div>
<div class="col-7"><img src="productimages/<?php echo htmlentities($row['Image3']);?>" width="250"><br />
    <a href="change-image3.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>

<div class="row">
<div class="col-2"><button type="submit" name="submit" class="btn btn-primary">Update</button></div>
</div>

</form>
      
      <?php } ?>                      </div>
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

<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Adding tblrentalcloth
if(isset($_POST['submit']))
{

    $pid=intval($_GET['id']);
   $category=$_POST['category'];
    $subcat=$_POST['subcategory'];
    $bookname=$_POST['bookname'];
    $authorname=$_POST['authorname'];
    $publisher=$_POST['publisher'];
    $tenisbn=$_POST['tenisbn'];
    $thirteenisbn=$_POST['thirteenisbn'];
    $blangauge=$_POST['blangauge'];
    $bookpricebd=$_POST['bookpricebd'];
    $bookprice=$_POST['bookprice'];
    $bookdescription=$_POST['bookdescription'];
    $bookshippingcharge=$_POST['bookshippingcharge'];
    $bookavailability=$_POST['bookavailability'];
    $updatedby=$_SESSION['aid'];

$sql=mysqli_query($con,"update tblbooks set category='$category',subCategory='$subcat',BookName='$bookname',AuthorName='$authorname',Publisher='$publisher',TENISBN='$tenisbn',THIRTEENISBN='$thirteenisbn',BookLanguage='$blangauge',BookPrice='$bookprice',BookPriceBeforeDiscount='$bookpricebd',BookDescription='$bookdescription',shippingCharge='$bookshippingcharge',BookAvailability='$bookavailability',lastUpdatedBy='$updatedby' where id='$pid'");
echo "<script>alert(' details updated successfully');</script>";
echo "<script>window.location.href='manage-tblrentalcloth.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping Portal | Edit </title>
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
                        <h1 class="mt-4">Edit </h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit </li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select tblrentalcloth.ID as pid,tblrentalcloth.Image1,tblrentalcloth.Image2,tblrentalcloth.Image3,tblrentalcloth.Name,category.categoryName,subcategory.subcategoryName as subcatname,tblrentalcloth.CreationDate,tblrentalcloth.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,tblrentalcloth.Title,tblrentalcloth.ProductCode,tblrentalcloth.Size,tblrentalcloth.Materials,tblrentalcloth.Color,tblrentalcloth.ProductDescription,tblrentalcloth.TermandCond,tblrentalcloth.Priceperday ,tblrentalcloth.SecurityAmount,tblrentalcloth.ShippingCharge from tblrentalcloth join subcategory on tblrentalcloth.SubCategory=subcategory.id join category on tblrentalcloth.Category=category.id join tbladmin on tbladmin.id=tblrentalcloth.addedBy where  tblrentalcloth.ID='$pid' order by pid desc");
while($row=mysqli_fetch_array($query))
{
?>                                 
<form  method="post" enctype="multipart/form-data">                                
<div class="row">
<div class="col-2">Category Name</div>
<div class="col-6">
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
<div class="col-2">Sub Category name</div>
<div class="col-6"><select   name="subcategory"  id="subcategory" class="form-control" required>
    <option value="<?php echo htmlentities($row['subid']);?>"><?php echo htmlentities($row['subcatname']);?>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Name</div>
<div class="col-6"><input type="text"    name="Name"  value="<?php echo htmlentities($row['Name']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Company</div>
<div class="col-6"><input type="text"    name="Company"  value="<?php echo htmlentities($row['Company']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Price Before Discount</div>
<div class="col-6"><input type="text"    name="pricebd"  value="<?php echo htmlentities($row['PriceBeforeDiscount']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Price After Discount(Selling Price)</div>
<div class="col-6"><input type="text"    name="price"  value="<?php echo htmlentities($row['Price']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Description</div>
<div class="col-6"><textarea  name="Description"  placeholder="Enter  Description" rows="6" class="form-control"><?php echo $row['Description'];?></textarea>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Shipping Charge</div>
<div class="col-6"><input type="text"    name="tblrentalclothhippingcharge"  value="<?php echo htmlentities($row['shippingCharge']);?>" class="form-control" required>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Availability</div>
<div class="col-6"><select   name="Availability"  id="Availability" class="form-control" required>
<?php $pa=$row['Availability'];
if($pa=='In Stock'):
?>
<option value="In Stock">In Stock</option>
<option value="Out of Stock">Out of Stock</option>
<?php else: ?>
<option value="Out of Stock">Out of Stock</option>    
<option value="In Stock">In Stock</option>
<?php endif; ?>
</select>
</select>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Featured Image</div>
<div class="col-6"><img src="images/<?php echo htmlentities($row['Image1']);?>" width="250"><br />
    <a href="change-image1.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> Image 2</div>
<div class="col-6"><img src="images/<?php echo htmlentities($row['Image2']);?>" width="250"><br />
    <a href="change-image2.php?id=<?php echo $row['pid'];?>">Change Image</a>
</div>
</div>


<div class="row" style="margin-top:1%;">
<div class="col-2"> Image 3</div>
<div class="col-6"><img src="images/<?php echo htmlentities($row['Image3']);?>" width="250"><br />
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

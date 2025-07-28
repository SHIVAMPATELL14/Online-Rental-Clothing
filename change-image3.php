<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {
//For Adding Products
if(isset($_POST['submit']))
{
$currentimage=$_POST['currentimage'];
$imagepath="productimages"."/".$currentimage;
$image3=$_FILES["image3"]["name"];
$extension1 = substr($image3,strlen($image3)-4,strlen($image3));
//Renaming the  image file
$imgnewfile=md5($image3.time()).$extension1;
move_uploaded_file($_FILES["image3"]["tmp_name"],"productimages/".$imgnewfile);
$updatedby=$_SESSION['aid'];
$pid=intval($_GET['id']);
$sql=mysqli_query($con,"update tblrentalcloth set Image3='$imgnewfile', lastUpdatedBy='$updatedby' where ID='$pid'");
unlink($imagepath);
echo "<script>alert('Product image updated successfully');</script>";
echo "<script>window.location.href='manage-rental-cloth.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       
        <title>OCRS | Update Image</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <script src="js/jquery-3.5.1.min.js"></script>   

    </head>
    <body>
   <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
   <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Image</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Update Image</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">


<?php 
$pid=intval($_GET['id']);
$query=mysqli_query($con,"select tblrentalcloth.Image3,tblrentalcloth.Title from tblrentalcloth  where  tblrentalcloth.ID='$pid' ");
while($row=mysqli_fetch_array($query))
{
?>                                 
<form  method="post" enctype="multipart/form-data">                                


<div class="row" style="margin-top:1%;">
<div class="col-2"> Title</div>
<div class="col-4"><input type="text"    name="title"  value="<?php echo htmlentities($row['Title']);?>" class="form-control" readonly>
</select>
</div>
</div>



<div class="row" style="margin-top:1%;">
<div class="col-2"> Old Featured Image</div>
<div class="col-4"><img src="productimages/<?php echo htmlentities($row['Image3']);?>" width="250"><br />
</div>
</div>

<div class="row" style="margin-top:1%;">
<div class="col-2"> New Featured Image</div>
<div class="col-4"><input type="file" name="image3" id="image3"  class="form-control" accept="image/*" title="Accept images only" required>
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

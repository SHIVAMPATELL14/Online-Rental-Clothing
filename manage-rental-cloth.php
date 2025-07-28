<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

if(isset($_GET['del']))
{
mysqli_query($con,"delete from tblrentalcloth where id = '".$_GET['id']."'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-rental-cloth.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
 
        <title>OCRS | Manage Rental Cloth</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
 <?php include_once('includes/header.php');?>
        <div id="layoutSidenav">
       <?php include_once('includes/sidebar.php');?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Manage Rental Cloth</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Rental Cloth</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Cloth Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Code</th>
                                            <th>Title</th>
                                            <th>Sub Category</th>
                                            <th>Category</th>
                                            <th>Creation date</th>
                                      
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Code</th>
                                            <th>Title</th>
                                            <th>Sub Category</th>
                                            <th>Category</th>
                                            <th>Creation date</th>
                                      
                                            <th>Created by</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
<?php $query=mysqli_query($con,"select tblrentalcloth.ID as pid,tblrentalcloth.Image1,tblrentalcloth.ProductCode,tblrentalcloth.Title,category.categoryName,subcategory.subcategoryName as subcatname,tblrentalcloth.CreationDate,subcategory.id as subid,tbladmin.username from tblrentalcloth join subcategory on tblrentalcloth.SubCategory=subcategory.id join category on tblrentalcloth.category=category.id join tbladmin on tbladmin.id=tblrentalcloth.addedBy order by pid desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>  

                                <tr>
                                            <td><?php echo htmlentities($cnt);?></td>
                                             <td><?php echo htmlentities($row['ProductCode']);?></td>
                                            <td><img src="productimages/<?php echo htmlentities($row['Image1']);?>" width="120">

                                                <?php echo htmlentities($row['Title']);?></td>
                                            <td><?php echo htmlentities($row['categoryName']);?></td>
                                            <td><?php echo htmlentities($row['subcatname']);?></td>
                                            <td> <?php echo htmlentities($row['CreationDate']);?></td>
                                           
                                            <td><?php echo htmlentities($row['username']);?></td>
                                            <td>
                                            <a href="edit-rental-cloth.php?id=<?php echo $row['pid']?>"><i class="fas fa-edit"></i></a> | 
                                            <a href="manage-rental-cloth.php?id=<?php echo $row['pid']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php $cnt=$cnt+1; } ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
<?php } ?>

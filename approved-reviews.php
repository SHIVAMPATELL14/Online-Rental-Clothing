<?php session_start();
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OCRS | Accepted Reviews</title>
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
                        <h1 class="mt-4">Accepted Reviews</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Accepted Reviews</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Accepted Details
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Title</th>
                                            <th>Name</th>
                                            <th>Review Title</th>
                                            <th>Date of Review</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Title</th>
                                            <th>Name</th>
                                            <th>Review Title</th>
                                            <th>Date of Review</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
 <?php
$ret=mysqli_query($con,"select tblreview.ID,tblreview.ProductID,tblreview.ReviewTitle,tblreview.Name,tblreview.DateofReview,tblrentalcloth.Title from tblreview join tblrentalcloth on tblrentalcloth.ID=tblreview.ProductID where tblreview.Status='Review Accept'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <tr class="gradeX">
                 <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['Title'];?></td>
                  <td><?php  echo $row['Name'];?></td>
                  <td><?php  echo $row['ReviewTitle'];?></td>
                  <td><?php  echo $row['DateofReview'];?></td>
                                    <td><a href="view-reviews.php?rid=<?php echo $row['ID'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?> 
                                       
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

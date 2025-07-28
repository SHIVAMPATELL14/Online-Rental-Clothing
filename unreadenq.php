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
        <title>OCRS | Unread Enquiry</title>
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
                        <h1 class="mt-4">Unread Enquiry</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Unread Enquiry</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Unread Enquiry Details
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered data-table">
                                    <thead>
                                       <tr>
                   <th>S.No</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Enquiry Date</th>
                     <th>Action</th>
                  </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                   <th>S.No</th>
                   <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Enquiry Date</th>
                     <th>Action</th>
                  </tr>
                                    </tfoot>
                                    <tbody>
 <?php
$ret=mysqli_query($con,"select * from tblcontact where IsRead is null");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?><tr class="gradeX">
                 <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['Name'];?></td>
                                        <td><?php  echo $row['Email'];?></td>
                                        <td>
                                            <?php echo $row['Phone'];?>
                                        </td>
                                        <td>
                                            <?php echo $row['dateofcontact'];?>
                                        </td>
                                         <td><a href="view-enquiry.php?viewid=<?php echo $row['id'];?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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

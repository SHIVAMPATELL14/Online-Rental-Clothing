<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

// Code for Take Action
if(isset($_POST['submit']))
  {
    
    $rid=$_GET['rid'];
    $ressta=$_POST['status'];
    $remark=$_POST['remark'];
     
   $query=mysqli_query($con, "update   tblreview set Status='$ressta',Remark='$remark' where ID='$rid'");
    if ($query) {
   
    echo '<script>alert("Review status has been updated.")</script>';
    echo "<script type='text/javascript'> document.location ='all-reviews.php'; </script>";
  }
  else
    {
    
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}
  

?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>OCRS | Review Details</title>
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
<tbody>
  

             <?php
 $rid=$_GET['rid'];
$ret=mysqli_query($con,"select tblreview.ID,tblreview.ProductID,tblreview.ReviewTitle,tblreview.Name,tblreview.DateofReview,tblreview.Review,tblreview.Remark,tblreview.Status,tblrentalcloth.Title,tblrentalcloth.ProductCode,tblrentalcloth.Image1 from tblreview join tblrentalcloth on tblrentalcloth.ID=tblreview.ProductID where tblreview.ID='$rid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>           

                    <div class="container-fluid px-4" >
                        <h1 class="mt-4">Review By <?php echo htmlentities($row['Name']);?> </h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Review Details
                            </div>
                            <div class="card-body" id="print">


                                <div class="row">
                                    <div class="col-12">
                                <table class="table table-bordered" border='1' width="100%">
                            
                                        <tr>
                                            <th colspan="4" style="text-align:center;">Product Details</th>
                                        </tr>
                                        <tr>
                                            <th>Toy Name</th>
                                            <td colspan="4"><?php echo htmlentities($row['Title']);?></td>
                                            </tr>
                                            <tr>
                                            <th>Product Code</th>
                                            <td colspan="4"> <?php echo htmlentities($row['ProductCode']);?></td>
                                            </tr>
                                            <tr>
                                            <th>Product Image</th>
                                            <td colspan="4"><img src="productimages/<?php echo htmlentities($row['Image1']);?>" alt="" width="100" height="100"></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                               <td colspan="4"><?php  
    $status=$row['Status'];
if($row['Status']=="Review Accept")
{
  echo "Review Accept";
}


if($row['Status']=="Review Reject")
{
  echo "Review Reject";
}

if($row['Status']=="")
{
  echo "Wait for approval";
}


     ;?></td>
                                           </tr>
                                            <tr align="center">
<td colspan="4" style="font-size:20px;color:blue">
 Review Details</td></tr>
 <tr>
    <th>Review By</th>
    <td><?php  echo $row['Name'];?></td>

    <th>Review Title</th>

    <td><?php  echo $row['ReviewTitle'];?></td>
  </tr>
  <tr>
    <th>Review</th>
    <td><?php  echo $row['Review'];?></td>
    <th>Date of Review</th>
    <td><?php  echo $row['DateofReview'];?></td>
  </tr>
                      

      <?php $cnt=$cnt+1; } ?>                           
                                       
                                    </tbody>
                                </table></div>





<!-- Order Track/Action History --->

<table class="table table-bordered data-table">

<?php

  if($status=="" ){ ?>
<form name="submit" method="post"> 
<tr>
    <th>Remark :</th>
    <td colspan="6">
    <textarea name="restremark" placeholder="" rows="4" cols="20"  required="true" class="form-control"></textarea></td>
  </tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" required="true" class="form-control" >
     <option value="Review Accept" >Select</option>
     <option value="Review Accept" >Review Accept</option>
          <option value="Review Reject">Review Reject</option>
     
   </select></td>
  </tr>
    <tr align="center" style="text-align: center';">
        <td><button type="submit"  name="submit" class="btn btn-primary">Update Review</button></td>
  </tr>
</form>

</table>

<?php } ?>


                            </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php include_once('includes/footer.php');?>
                </footer>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
<form method="post" name="takeaction">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update the Review Status</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<p><select name="status" class="form-control" required>
    <option value="">Select</option>
   <option value="Review Accept" selected="true">Review Accept</option>
          <option value="Review Reject">Review Reject</option>
</select></p>
<p>
<textarea class="form-control" required name="remark" placeholder="Remark"></textarea></p>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit" name="takeaction">Save changes</button></div>
        </div>
    </form>
    </div>
</div>
</div>

        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
               <script>
function CallPrint(strid) {
var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}

</script>
    </body>
</html>
<?php } ?>

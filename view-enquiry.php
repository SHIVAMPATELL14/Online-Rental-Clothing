<?php session_start();
error_reporting(0);
include_once('includes/config.php');
if(strlen( $_SESSION["aid"])==0)
{   
header('location:logout.php');
} else {

$vid=$_GET['viewid'];
$isread=1;
$query=mysqli_query($con, "update   tblcontact set IsRead ='$isread' where ID='$vid'");
  

?>
<!DOCTYPE html>
<html lang="en">
    <head>
      
        <title>OCRS | View Enquiry</title>
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
  

           

                    <div class="container-fluid px-4" >
                   
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               View Enquiry
                            </div>
                            <div class="card-body" id="print">


                                <div class="row">
                                    <div class="col-12">
                                 <?php
             
$ret=mysqli_query($con,"select * from tblcontact where ID=$vid");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                 <table class="table table-bordered mg-b-0" style="font-size: 20px;">
                                   
                                   <tr style="color: blue;font-size: 30px;text-align: center;"><td colspan="6">View Enquiry</td></tr>
              
                <tr>
    <th scope style="font-size: 15px;">Name</th>
    <td><?php  echo $row['Name'];?></td></tr>
    <tr>
    <th style="font-size: 15px;" scope>Email</th>
    <td colspan="2"><?php  echo $row['Email'];?></td>
  
                </tr>
                <tr>
    <th style="font-size: 15px;">Phone Number</th>
    
    <td colspan="2"><?php  echo $row['Phone'];?></td></tr>
    <tr>
    <th style="font-size: 15px;">Message</th>

    <td colspan="2"><?php  echo $row['Message'];?></td>
  </tr>
              </table><?php $cnt=$cnt+1;} ?></div>



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

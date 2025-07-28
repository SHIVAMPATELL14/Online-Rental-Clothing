     <?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['subscribe']))
{

$email=$_POST['emailid'];

$sql=mysqli_query($con,"select id from tblsubscriber where Email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into tblsubscriber(Email) values('$email')");
if($query)
{
    echo "<script>alert('You are successfully subscribe with us');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
} } else{
 echo "<script>alert('Email id already subcribe with other user. Please try  with another email id.');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";   
}}
?>
    <div class="content-section">
        <div class="container">
            <div class="col-md-4 about-us">
                <h4>LITTLE ABOUT US</h4>
                 <?php
$ret=mysqli_query($con,"select * from  tblpage where PageType='aboutus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                <p style="text-align: justify"><?php  echo $row['PageDescription'];?></p><?php } ?>
            </div>
        
            <div class="col-md-4 contact-us">
                <h4>CONTACT US</h4>
                <?php
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                <ul>
                    <li><i class="message"></i></li>
                    <li><?php  echo $row['Email'];?></li>
                </ul>
                <ul>
                    <li><i class="land-phone"></i></li>
                    <li><?php  echo $row['MobileNumber'];?></li>
                </ul>
             <ul>
                    <li><i class="land-address"></i></li>
                    <li><?php  echo $row['PageDescription'];?></li>
                </ul><?php } ?>
            </div>
            <div class="col-md-4 about-us">
                <h4>SIGN TO NEWSLETTER</h4>
               <form action="#" method="post">
                  <div class="form-group sub-info-mail">
                     <input type="email" class="form-control email-sub-agile" placeholder="Email" name="emailid" required><input type="submit" name="subscribe" value="subscribe">
                  </div>
                
               </form>
              
            </div>  
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="col-md-6 bottom-menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="account.php">Signup</a></li>
                    <li><a href="account.php">Signin</a></li>
                    <li><a href="contact.php"> CONTACT</a></li>
                </ul>
            </div>
            <div class="col-md-6 copy-rights">
                <p>Online Cloth Rental System</p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
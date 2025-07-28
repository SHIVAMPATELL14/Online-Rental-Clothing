<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

if(isset($_POST['update']))
{
$currentpwd=md5($_POST['cpass']);
$newpwd=md5($_POST['newpass']);
$uid=$_SESSION['id'];
$sql=mysqli_query($con,"SELECT id FROM  users where password='$currentpwd' and id='$uid'");
$num=mysqli_num_rows($sql);
if($num>0)
{
 $con=mysqli_query($con,"update users set password='$newpwd' where id='$uid'");
echo "<script>alert('Password Changed Successfully !!');</script>";
 echo "<script type='text/javascript'> document.location ='setting.php'; </script>";
}else{
    echo "<script>alert('Current Password not match !!');</script>";
     echo "<script type='text/javascript'> document.location ='setting.php'; </script>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Cloth Renting System || Change Password</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/demo1.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<!-- JavaScript includes -->
		<script src="js/ipresenter.packed.js"></script>
		<script>
			$(document).ready(function(){
				$('#ipresenter').iPresenter({
					timerPadding: -1,
					controlNav: true,
					controlNavThumbs: true,
					controlNavNextPrev: false
				});
			});
		</script>
			    <script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		  <script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cnfpass.focus();
return false;
}
return true;
}
</script>
</head>
<body>
	<!-- header-section-starts -->

	<?php include_once('includes/header.php');?>
<!-- header-section-ends -->
<!-- content-section-starts -->
	<div class="container">
	  <div class="main">
	 	 <div class="contact">				
					
				  <div class="contact-form">
			 	  	 	<h2>Change Password</h2>

			 	 	    <form method="post" action="" name="chngpwd" onSubmit="return valid();">

					    	<div>
						    	<span><label>Current Password</label></span>
						    	<span><input type="password" class="form-control" id="cpass" name="cpass" required="required"></span>
						    </div>
						    <div>
						    	<span><label>New Password</label></span>
						    	<span><input type="password" class="form-control" id="newpass" name="newpass"></span>
						    </div>
						    <div>
						     	<span><label>Confirm Password</label></span>
						    	<span><input type="password" class="form-control" id="cnfpass" name="cnfpass" required="required"></span>
						    </div>
						    
						   <div>
						   		<span><input type="submit" name="update" class="" value="Update"></span>
						  </div>
					    </form>
				    </div>
  				<div class="clearfix"></div>		
			  </div>
		</div>
</div>
</div>		
</div>
  <?php include_once('includes/footer.php');?>

</body>
</html><?php } ?>
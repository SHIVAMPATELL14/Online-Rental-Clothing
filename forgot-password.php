 <?php session_start();
include_once('includes/config.php');
error_reporting(0);

if(isset($_POST['pass']))
{
$emailid=$_POST['emailid'];
$cnumber=$_POST['contactno'];
$newpassword=md5($_POST['inputPassword']);
$ret=mysqli_query($con,"SELECT id FROM users WHERE email='$emailid' and contactno='$cnumber'");
$num=mysqli_num_rows($ret);
if($num>0)
{
$query=mysqli_query($con,"update users set password='$newpassword' WHERE  email='$emailid' and contactno='$cnumber'");

echo "<script>alert('Password reset successfully.');</script>";
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}else{
echo "<script>alert('Invalid username or Contact Number');</script>";
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>OCRS|| Account Page</title>
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
		<script>
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-email-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
 if(document.passwordrecovery.inputPassword.value!= document.passwordrecovery.cinputPassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.passwordrecovery.cinputPassword.focus();
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
	<!-- start registration -->
	<div class="container">
		<div class="registration">
		
	<div class="registration_left">
		<h2>Forgot Password</h2>
		<a href="#"><div class="reg_fb"><i>Reset Your Password</i><div class="clear"></div></div></a>
		 <div class="registration_form">
		 <!-- Form -->
			<form method="post" name="passwordrecovery" onSubmit="return valid();">
				<div>
					<label>
						<input placeholder="email:" type="email" tabindex="3" required name="emailid" id="emailid">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Contact No:" type="text" tabindex="3" required name="contactno" id="contactno">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="New Password:" type="password" tabindex="3" required name="inputPassword" id="inputPassword">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Confirm Password" type="password" tabindex="4" name="cinputPassword" required>
					</label>
				</div>						
				<div>
					<input type="submit" value="Reset" id="register-submit"  name="pass" id="pass">
				</div>
				<div class="forget">
					<a href="#">forgot your password</a>
				</div>
			</form>
			<!-- /Form -->
			</div>
		</div>
		<div class="clearfix"></div>
		</div>
		</div>
	</div>
</div>
   <!-- content-section-ends -->	
   <!-- contact-section-starts -->
<?php include_once('includes/footer.php');?>
	<!-- contact-section-ends -->
	
</body>
</html>
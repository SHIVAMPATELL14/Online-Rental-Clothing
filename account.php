 <?php session_start();
include_once('includes/config.php');
error_reporting(0);

if(isset($_POST['login']))
{
   $email=$_POST['emailid'];
   $password=md5($_POST['inputuserpwd']);
$query=mysqli_query($con,"SELECT id,name FROM users WHERE email='$email' and password='$password'");
$num=mysqli_fetch_array($query);
//If Login Suceesfull
if($num>0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['username']=$num['name'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
//If Login Failed
else{
    echo "<script>alert('Invalid login details');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
exit();
}
}

// Sign up
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$gender=$_POST['gender'];
$contactno=$_POST['contactnumber'];
$password=md5($_POST['inputuserpwd']);
$sql=mysqli_query($con,"select id from users where email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into users(name,email,gender,contactno,password) values('$name','$email','$gender','$contactno','$password')");
if($query)
{
    echo "<script>alert('You are successfully register');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
}
else{
echo "<script>alert('Not register something went worng');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
} } else{
 echo "<script>alert('Email id already registered with another accout. Please try  with another email id.');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";   
}}

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
		<h2>new user? <span> create An account </span></h2>

		<!-- [if IE] 
		    < link rel='stylesheet' type='text/css' href='ie.css'/>  
		 [endif] -->  
		  
		<!-- [if lt IE 7]>  
		    < link rel='stylesheet' type='text/css' href='ie6.css'/>  
		<! [endif] -->  
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		})();
		</script>
		 <div class="registration_form">
		 <!-- Form -->
			<form action="" method="post" name="signup">
				<div>
					<label>
						<input placeholder="Enter Your Name" name="fullname" type="text" tabindex="1" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Contact Number" name="contactnumber" pattern="[0-9]{10}" title="10 numeric characters only" type="text" tabindex="2" required autofocus>
					</label>
				</div>
				<div>
					<label>
						<input type="email" placeholder="Your Email" name="emailid" id="emailid" onBlur="emailAvailability()" tabindex="3" required>
					</label>
				</div>
				<div class="sky-form">
					<div class="sky_form1">
						<ul>
							<li><label class="radio left"><input type="radio" name="gender" checked="" value="Male"><i></i>Male</label></li>
							<li><label class="radio"><input type="radio" name="gender" value="Female"><i></i>Female</label></li>
							<div class="clearfix"></div>
						</ul>
					</div>
				</div>
				<div>
					<label>
						<input placeholder="password" type="password" name="inputuserpwd" tabindex="4" required>
					</label>
				</div>						
					
				<div>
					<input type="submit" value="create an account" id="submit" name="submit">
				</div>
				
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="registration_left">
		<h2>Existing user</h2>

		 <div class="registration_form">
		 <!-- Form -->
			<form name="login" action="" method="post">
				<div>
					<label>
						<input placeholder="email:" type="email" tabindex="3" required name="emailid" id="emailid">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="password" type="password" tabindex="4" name="inputuserpwd" required>
					</label>
				</div>						
				<div>
					<input type="submit" value="sign in" id="register-submit"  name="login" id="login">
				</div>
				<div class="forget">
					<a href="forgot-password.php">forgot your password</a>
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
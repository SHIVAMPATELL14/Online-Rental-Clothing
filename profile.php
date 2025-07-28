<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

//For updating User  Profile
if(isset($_POST['update']))
{
$name=$_POST['fullname'];
$uid=$_SESSION['id'];
$contactno=$_POST['contactnumber'];
$query=mysqli_query($con,"update users set name='$name',contactno='$contactno' where id='$uid'");
if($query)
{
    echo "<script>alert('Profile Updated successfully');</script>";
    echo "<script type='text/javascript'> document.location ='profile.php'; </script>";
}else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='profile.php'; </script>";
} }
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Cloth Renting System||User Profile</title>
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
	<div class="container">
	  <div class="main">
	 	 <div class="contact">				
					
				  <div class="contact-form">
			 	  	 	<h2>User Profile</h2>

			 	 	    <form method="post" action="">
 <?php 
$uid=$_SESSION['id'];
$query=mysqli_query($con,"select * from users where id='$uid'");
while($result=mysqli_fetch_array($query)){

?>
					    	<div>
						    	<span><label>Full Name</label></span>
						    	<span><input name="fullname" value="<?php echo htmlentities($result['name']);?>" type="text" class="form-control"></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input type="email" name="emailid" id="emailid" value="<?php echo htmlentities($result['email']);?>" readonly class="form-control"></span>
						    </div>
						    <div>
						     	<span><label>Mobile</label></span>
						    	<span><input name="contactnumber" value="<?php echo htmlentities($result['contactno']);?>" pattern="[0-9]{10}" title="10 numeric characters only" type="text" class="form-control"></span>
						    </div>
						    
						   <div><?php } ?>
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
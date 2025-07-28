<?php
include('includes/config.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $phone=$_POST['phone'];     
    $query=mysqli_query($con, "insert into tblcontact(Name,Email,Phone,Message) value('$name','$email','$phone','$message')");
    if ($query) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Online Cloth Renting System||Contact Us</title>
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
			 	  	 	<h2>Contact Us</h2>

			 	 	    <form method="post" action="">
 
					    	<div>
						    	<span><label>Full Name</label></span>
						    	<span> <input type="text" placeholder="Name" class="form-control" required="true" name="name"></span>
						    </div>
						    <div>
						    	<span><label>E-mail</label></span>
						    	<span><input type="email" class="form-control" placeholder="Enter" required="true" name="email"></span>
						    </div>
						    <div>
						     	<span><label>Mobile</label></span>
						    	<span> <input type="text" class="form-control" placeholder="Phone" required="true" name="phone"></span>
						    </div>
						     <div>
						     	<span><label>Message</label></span>
						    	<span><textarea class="form-control" rows="3" required="true" name="message" placeholder="Enter the message"></textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name="submit" class="" value="Send"></span>
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
</html>
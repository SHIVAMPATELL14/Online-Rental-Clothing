<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
?>
<!DOCTYPE html>
<html>
<head>
<title>OCRS || My Orders</title>
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
					<div class="contact_info">
						<h2>My Orders</h2>
			    	 		<div class="map">
					   			 <div class="contact-list-grid">
                     <table class="table table-bordered">
                           <thead >
                              <tr>
                                 <th style="text-align:center;font-size: 20px; padding-right: 10px;">#</th>
                    <th style="text-align:center;font-size: 20px; padding-right: 10px;">Order Number </th>
                    <th style="text-align:center;font-size: 20px; padding-right: 10px;">Order Date</th>
                    <th style="text-align:center;font-size: 20px; padding-right: 10px;">Transaction Type</th>
                    <th style="text-align:center;font-size: 20px; padding-right: 10px;">Total Amount</th>
                    <th style="text-align:center;font-size: 20px; padding-right: 10px;">Order Status</th>
                    <th style="text-align:center;font-size: 20px; padding-right: 10px;">Action</th>
                              </tr>
                           </thead>
                           <tbody>
 <?php
$uid=$_SESSION['id'];
$ret=mysqli_query($con,"select * from orders where userId='$uid'");
$num=mysqli_num_rows($ret);
$cnt=1;
    if($num>0)
    {
while ($row=mysqli_fetch_array($ret)) {

?>
                              <tr>
                    <td style="text-align:center;font-size: 20px; padding-right: 10px;"><?php echo htmlentities($cnt);?></td>
                    <td style="text-align:center;font-size: 20px; padding-right: 10px;"><?php echo htmlentities($row['orderNumber']);?></td>
                    <td style="text-align:center;font-size: 20px; padding-right: 10px;"><?php echo htmlentities($row['orderDate']);?></td>
                    <td style="text-align:center;font-size: 20px; padding-right: 10px;"><?php echo htmlentities($row['txnType']);?></td>
                    <td style="text-align:center;font-size: 20px; padding-right: 10px;"><?php echo htmlentities($row['totalAmount']);?></td>
                    <td style="text-align:center;font-size: 20px; padding-right: 10px;"><?php $ostatus=$row['orderStatus'];
                    if( $ostatus==''): echo "Not Processed Yet";
                        else: echo $ostatus; endif;?><br />
                    </td>
                    <td style="text-align:center;font-size: 20px"><a href="order-details.php?onumber=<?php echo htmlentities($row['orderNumber']);?>" class="btn-upper btn btn-primary">Details</a></td>
                
                </tr>
            
                <?php $cnt++;}  } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold " colspan="7">Not Order Yet.&nbsp;
<a href="shop.php" class="btn-upper btn btn-warning">Continue Shopping</a>
                    </td>

                </tr>
                <?php } ?>
                             
                           </tbody>
                        </table>
            </div>
					   		</div>
      		
  			
			  </div>
		</div>
</div>
</div>		
</div>
 
	<?php include_once('includes/footer.php');?>
	
	
</body>
</html><?php } ?>
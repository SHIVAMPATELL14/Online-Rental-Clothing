<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{

// Code for product deletion from  cart  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from cart where id='$wid'");
 echo "<script>alert('product deleted from cart.');</script>";
echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>OCRS || My Cart</title>
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
						<h2>Your shopping cart contains:</h2>
			    	 		<div class="map">
					   			<table class="table table-bordered">
    <thead>
        <tr>
            <th style="text-align:center;font-size: 20px">SL No.</th>
            <th style="text-align:center;font-size: 20px">Image</th>
            <th style="text-align:center;font-size: 20px">Quantity</th>
            <th style="text-align:center;font-size: 20px">Product Name</th>
            <th style="text-align:center;font-size: 20px">Number of Days</th>
            <th style="text-align:center;font-size: 20px">Price</th>
            <th style="text-align:center;font-size: 20px">Security Amount</th>
            <th style="text-align:center;font-size: 20px">Total Amount</th>
            <th style="text-align:center;font-size: 20px">Remove</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $uid = $_SESSION['id'];
        $ret = mysqli_query($con, "SELECT tblrentalcloth.Title, tblrentalcloth.ID AS proid, tblrentalcloth.Image1 AS pimage, cart.productId AS pid, cart.BookingFromDate, cart.BookingToDate, tblrentalcloth.ProductCode, tblrentalcloth.Size, tblrentalcloth.Materials, tblrentalcloth.Color, tblrentalcloth.ProductDescription, tblrentalcloth.TermandCond, tblrentalcloth.Priceperday AS pprice, tblrentalcloth.SecurityAmount AS samt, tblrentalcloth.ShippingCharge, cart.id AS cartid, cart.productQty FROM cart JOIN tblrentalcloth ON tblrentalcloth.ID=cart.productId WHERE cart.userID='$uid'");
        $cnt = 1;
        $num = mysqli_num_rows($ret);
        if ($num > 0) {
            while ($row = mysqli_fetch_array($ret)) {
                $start_date = new DateTime($row['BookingFromDate']);
                $end_date = new DateTime($row['BookingToDate']);
                $diff = $start_date->diff($end_date)->days;
                ?>
                <tr class="rem1">
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($cnt); ?></td>
                    <td style="text-align:center;font-size: 20px"><a href="single-cloth-details.php?pid=<?php echo htmlentities($row['pid']); ?>"><img src="admin/productimages/<?php echo htmlentities($row['pimage']); ?>" width="150" height="120" alt=" " class="img-responsive"></a></td>
                    <td style="text-align:center;font-size: 20px">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value"><span><?php echo htmlentities($row['productQty']); ?></span></div>
                            </div>
                        </div>
                    </td>
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($row['Title']); ?></td>
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($diff); ?></td>
                    <td style="text-align:center;font-size: 20px">Rs.<?php echo htmlentities($row['pprice']); ?></td>
                    <td style="text-align:center;font-size: 20px">Rs.<?php echo htmlentities($row['samt']); ?></td>
                    <td style="text-align:center;font-size: 20px">Rs.<?php echo htmlentities(($row['productQty'] * $row['pprice'] *$diff) + $row['samt']); ?></td>
                    <td style="text-align:center;font-size: 20px">
                        <a href="my-cart.php?del=<?php echo htmlentities($row['cartid']); ?>" onClick="return confirm('Are you sure you want to delete?')" class="btn-upper btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
                $cnt = $cnt + 1;
            }
            ?>
            <tr>
                <td colspan="8" style="text-align:right;">
                    <a href="products.php" class="btn-upper btn btn-warning">Continue Shopping</a>
                    <a href="checkout.php" class="btn-upper btn btn-primary">Proceed to Checkout</a>
                </td>
            </tr>
            <?php
        } else {
            ?>
            <tr>
                <td style="font-size: 18px; color:red; font-weight:bold " colspan="7">Your Cart is Empty.&nbsp;
                    <a href="products.php" class="btn-upper btn btn-warning">Continue Shopping</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
					   		</div>
      		
  			
			  </div>
		</div>
</div>
</div>		
</div>
 
	<?php include_once('includes/footer.php');?>
	
	
</body>
</html><?php } ?>
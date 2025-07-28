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
<title>OCRS || Order Details</title>
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
		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
					<div class="contact_info">
						<h2>Order Details</h2>
			    	 		<div class="map">
					   			 <div class="contact-list-grid">
                    <?php
$uid=$_SESSION['id'];
$orderno=intval($_GET['onumber']);
$ret=mysqli_query($con,"select *,orders.id as orderid from orders 
left join addresses on addresses.id=orders.addressId
    where orders.userId='$uid' and orders.orderNumber='$orderno'");
while ($row=mysqli_fetch_array($ret)) {?>
                        <h4>Orders Detail: <span>(<?php echo intval($_GET['onumber']);?>)</span></h4>

                        <table class="table table-bordered">
                           <tr>
    <th>Order Number</th>
    <td><?php echo htmlentities($row['orderNumber']);?></td>

    <th>Order Date</th>
    <td><?php echo htmlentities($row['orderDate']);?></td>
</tr>
<tr>
    <th>Total Amount</th>
    <td><?php echo htmlentities($row['totalAmount']);?></td>

    <th>Txn Type</th>
    <td><?php echo htmlentities($row['txnType']);?></td>
</tr>
<tr>
    <th>Txn Number</th>
    <td><?php echo htmlentities($row['txnNumber']);?></td>

    <th>Status</th>
    <td><?php $ostatus=$row['orderStatus'];
                    if( $ostatus==''): echo "Not Processed Yet";
                        else: echo $ostatus; endif;?>
                            <br />
<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo $row['orderid'];?>');" title="Track order"> <strong style="color:red;"> Track order</strong>
</a>

                        </td>
</tr>

<tr>
    <th>Billing Address</th>
    <td><address><?php echo htmlentities($row['billingAddress']);?><br />
<?php echo htmlentities($row['biilingCity']);?>,<?php echo htmlentities($row['billingState']);?><br />
<?php echo htmlentities($row['billingPincode']);?>, <?php echo htmlentities($row['billingCountry']);?>
</address>
    </td>

    <th>Shipping Address</th>
    <td><address><?php echo htmlentities($row['shippingAddress']);?><br />
<?php echo htmlentities($row['shippingCity']);?>,<?php echo htmlentities($row['shippingState']);?><br />
<?php echo htmlentities($row['shippingPincode']);?>, <?php echo htmlentities($row['shippingCountry']);?>
</address>
    </td>
</tr>
<tr><td colspan="2"><a href="javascript:void(0);" onClick="popUpWindow('cancelorder.php?oid=<?php echo $row['orderid'];?>');" title="Cancel Order" class="btn-upper btn btn-danger">Canel this Order
</a></td></tr> <?php }?>
                        </table>

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
          
        </tr>
    </thead>
    <tbody>
        <?php
        $uid = $_SESSION['id'];
        $ret = mysqli_query($con, "SELECT tblrentalcloth.Title, tblrentalcloth.ID AS proid, tblrentalcloth.Image1 AS pimage,  tblrentalcloth.ProductCode, tblrentalcloth.Size, tblrentalcloth.Materials, tblrentalcloth.Color, tblrentalcloth.ProductDescription, tblrentalcloth.TermandCond, tblrentalcloth.Priceperday AS pprice, tblrentalcloth.SecurityAmount AS samt, tblrentalcloth.ShippingCharge, ordersdetails.productId as pid,ordersdetails.id as cartid,ordersdetails.quantity,ordersdetails.BookingFromDate,ordersdetails.BookingToDate from ordersdetails left join tblrentalcloth on tblrentalcloth.ID=ordersdetails.productId where ordersdetails.userId='$uid'  and ordersdetails.orderNumber='$orderno'");
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
                                <div class="entry value"><span><?php echo htmlentities($row['quantity']); ?></span></div>
                            </div>
                        </div>
                    </td>
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($row['Title']); ?></td>
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($diff); ?></td>
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($row['pprice']); ?></td>
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($row['samt']); ?></td>
                    <td style="text-align:center;font-size: 20px"><?php echo htmlentities($totalamount=($row['quantity'] * $row['pprice'] *$diff) + $row['samt']); ?></td>
               
                </tr>
               </tr><?php $cnt=$cnt+1;
$grantotal+=$totalamount;
                               } ?>
                           
                              <tr>
    <th colspan="4">Grand Total</th>
    <th colspan="4"><?php echo $grantotal;?></th>
</tr>
            <?php } else{ ?>
                <tr>
                    <td style="font-size: 18px; font-weight:bold; color:red;">Invalid Request

                    </td>

                </tr> <?php } ?>
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
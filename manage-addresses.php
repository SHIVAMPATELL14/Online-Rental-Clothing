<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['id'])==0)
{   header('location:logout.php');
}else{
// Code for Product deletion from  cart  
if(isset($_GET['del']))
{
$wid=intval($_GET['del']);
$query=mysqli_query($con,"delete from cart where id='$wid'");
 echo "<script>alert('Product deleted from cart.');</script>";
echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
// For Address Insertion
if(isset($_POST['submit'])){
$uid=$_SESSION['id'];    
//Getting Post Values
$baddress=$_POST['baddress'];
$bcity=$_POST['bcity'];
$bstate=$_POST['bstate'];
$bpincode=$_POST['bpincode'];
$bcountry=$_POST['bcountry'];
$saddress=$_POST['saddress'];
$scity=$_POST['scity'];
$sstate=$_POST['sstate'];
$spincode=$_POST['spincode'];
$scountry=$_POST['scountry'];

$sql=mysqli_query($con,"insert into addresses(userId,billingAddress,biilingCity,billingState,billingPincode,billingCountry,shippingAddress,shippingCity,shippingState,shippingPincode,shippingCountry) values('$uid','$baddress','$bcity','$bstate','$bpincode','$bcountry','$saddress','$scity','$sstate','$spincode','$scountry')");
if($sql)
{
    echo "<script>alert('You Address added successfully');</script>";
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
else{
echo "<script>alert('Something went wrong. Please try again.');</script>";
    echo "<script type='text/javascript'> document.location ='checkout.php'; </script>";
}
}
//For Proceeding Payment
if(isset($_POST['proceedpayment'])){
 $address=$_POST['selectedaddress'];  
 $gtotal=$_POST['grandtotal']; 
 $_SESSION['address']=$address;
 $_SESSION['gtotal']=$gtotal;
   echo "<script type='text/javascript'> document.location ='payment.php'; </script>";   
}
?>
<!DOCTYPE html>
<html>
<head>
<title>OCRS || Manage Addresses</title>
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
<script src="js/jquery.3.7.1.min.js"></script>
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
						<h2>Manage Addresses:</h2>
			    	 		<div class="map">
					   		
<br>
                    <h4 style="color:blue">Already Listed Addresses</h4>
<?php 
$uid=$_SESSION['id'];
$query=mysqli_query($con,"select * from addresses where userId='$uid'");
$count=mysqli_num_rows($query);
if($count==0):
echo "<font color='red'>No addresses Found.</font>";
else:
 ?>
 <form method="post">
    <input type="hidden" name="grandtotal" value="<?php echo $grantotal; ?>">
<div class="row">

<!-- Fecthing Values-->
<div class="row">
<div class="col-md12">
     <table class="table table-bordered">
            <thead>
                <tr>
                    <th colspan="6" style="color:blue;"><h4>Billing Address</h4></th>
                </tr>
            </thead>
            <tr>
                <thead>
                    <th width="250">Billing Adresss</th>
                    <th>BillingCity</th>
                    <th>Billing State</th>
                    <th>Billing Pincode</th>
                    <th>Billing Country</th>
               <th width="250">Shipping Adresss</th>
                    <th>Shipping City</th>
                    <th>Shipping State</th>
                    <th>Shipping Pincode</th>
                    <th>ShippingCountry</th>
                </thead>
            </tr>
            <?php while ($result=mysqli_fetch_array($query)) { ?>
                <tr>
            
                    <td width="250"><?php echo $result['billingAddress'];?></td>
                    <td><?php echo $result['biilingCity'];?></td>
                    <td><?php echo $result['billingState'];?></td>
                    <td><?php echo $result['billingPincode'];?></td>
                    <td><?php echo $result['billingCountry'];?></td>
                        <td width="250"><?php echo $result['shippingAddress'];?></td>
                    <td><?php echo $result['shippingCity'];?></td>
                    <td><?php echo $result['shippingState'];?></td>
                    <td><?php echo $result['shippingPincode'];?></td>
                    <td><?php echo $result['shippingCountry'];?></td>
                </tr>
            <?php } ?>
            </table> 
</form>
<?php  endif;?>
 <div class="checkout-left">
                        <form method="post" name="address" class="creditly-card-form agileinfo_form">
                        <div class="col-md-6 checkout-left-basket">
                           <h4>New Shipping Address</h4>
                           
                        
                               <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    <div class="first-row form-group">
                                       <div class="controls">
                                          <label class="control-label">Address: </label>
                                          
                                          <input type="text" name="saddress"  id="saddress" class="form-control" required >
                                       </div>
                                       <div class="card_number_grids">
                                          <div class="card_number_grid_left">
                                             <div class="controls">
                                                <label class="control-label">City:</label>
                                                <input type="text" name="scity" id="scity" class="form-control" required>
                                             </div>
                                          </div>
                                          <div class="card_number_grid_right">
                                             <div class="controls">
                                                <label class="control-label">State: </label>
                                                <input type="text" name="sstate" id="sstate" class="form-control" required>
                                             </div>
                                          </div>
                                          <div class="clear"> </div>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Pincode: </label>
                                          <input type="text" name="spincode" id="spincode" pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control" required>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Country: </label>
                                         <input type="text" name="scountry" id="scountry" class="form-control" required>
                                       </div>
                                    </div>
                                    
                                 </div>
                                 <input type="checkbox" name="adcheck" value="1"/> <small>Shipping Adress same as billing Address</small>
                              </section>
                           
                        </div>
                        <div class="col-md-6 checkout-left-basket">
                           <h4>New Billing Address</h4>
                           
                              <section class="creditly-wrapper wrapper">
                                 <div class="information-wrapper">
                                    <div class="first-row form-group">
                                       <div class="controls">
                                          <label class="control-label">Address: </label>
                                          
                                          <input type="text" name="baddress" id="baddress" class="billing-address-name form-control" required >
                                       </div>
                                       <div class="card_number_grids">
                                          <div class="card_number_grid_left">
                                             <div class="controls">
                                                <label class="control-label">City:</label>
                                                <input class="form-control" type="text" name="bcity" id="bcity">
                                             </div>
                                          </div>
                                          <div class="card_number_grid_right">
                                             <div class="controls">
                                                <label class="control-label">State: </label>
                                                <input type="text" name="bstate" id="bstate" class="form-control" required>
                                             </div>
                                          </div>
                                          <div class="clear"> </div>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Pincode: </label>
                                          <input type="text" name="bpincode" id="bpincode" pattern="[0-9]+" title="only numbers" maxlength="6" class="form-control" required>
                                       </div>
                                       <div class="controls">
                                          <label class="control-label">Country: </label>
                                         <input type="text" name="bcountry" id="bcountry" class="form-control" required>
                                       </div>
                                    </div>
                                   
                                 </div>
                              </section>
                           
                           <div class="checkout-center-basket">
                              <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Add" required>
                           </div></form>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="clearfix"></div>


					   		</div>
      		
  			
			  </div>
		</div>
</div>
</div>		
</div>
 
	<?php include_once('includes/footer.php');?>
      <script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $('#baddress').val($('#saddress').val() );
                $('#bcity').val($('#scity').val());
                $('#bstate').val($('#sstate').val());
                $('#bpincode').val( $('#spincode').val());
                  $('#bcountry').val($('#scountry').val() );
            } 
            
        });
    });
</script>
	
	
</body>
</html><?php } ?>
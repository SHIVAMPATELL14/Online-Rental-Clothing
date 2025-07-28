<?php session_start();
include_once('includes/config.php');
error_reporting(0);
if(isset($_POST['review']))
  {
    $name=$_POST['name'];
    $preview=$_POST['preview'];
    $reviewtitle=$_POST['reviewtitle'];
     $pid=$_GET['pid'];
    $query=mysqli_query($con, "insert into tblreview(ProductID,ReviewTitle,Review,Name) value('$pid','$reviewtitle','$preview','$name')");
    if ($query) {
   echo "<script>alert('Your review was sent successfully!.');</script>";
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
//Code for Wish List
$pid=intval($_GET['pid']);
if(isset($_POST['wishlist'])){
if(strlen($_SESSION['id'])==0)
{   
echo "<script>alert('Login is required to wishlist a product');</script>";
} else{
$userid=$_SESSION['id'];    
$query=mysqli_query($con,"select id from wishlist where userId='$userid' and productId='$pid'");
$count=mysqli_num_rows($query);
if($count==0){
mysqli_query($con,"insert into wishlist(userId,productId) values('$userid','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
  echo "<script type='text/javascript'> document.location ='my-wishlist.php'; </script>";
} else { 
echo "<script>alert('This product is already added in your wishlist.');</script>";
}
}}

//Code for Adding Product in to Cart
if(isset($_POST['addtocart'])){
if(strlen($_SESSION['id'])==0)
{   
echo "<script>alert('Login is required to add a product in to the cart');</script>";
} else{
$userid=$_SESSION['id']; 
$pqty='1'; 
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 


$ret=mysqli_query($con,"SELECT *
FROM ordersdetails
WHERE productId='$pid'
AND('$fromdate' BETWEEN date(BookingFromDate) and date(BookingToDate) || '$todate' BETWEEN date(BookingFromDate) and date(BookingToDate) || date(BookingFromDate) BETWEEN '$fromdate' and '$todate') and (orderStatus='Packed' || orderStatus='Dispatched' || orderStatus='In Transit' || orderStatus='Out For Delivery' || orderStatus='Delivered' || orderStatus='Cancelled' || orderStatus='' || orderStatus is null)");
 $count=mysqli_num_rows($ret);
if($count==0){

$query=mysqli_query($con,"select id,productQty from cart where userId='$userid' and productId='$pid'");
$count=mysqli_num_rows($query);
if($count==0){
mysqli_query($con,"insert into cart(userId,productId,productQty,BookingFromDate,BookingToDate) values('$userid','$pid','$pqty','$fromdate','$todate')");
echo "<script>alert('Product added in cart');</script>";
  echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
} else { 
$row=mysqli_fetch_array($query);
$currentpqty=$row['productQty'];
$productqty=$pqty+$currentpqty;
mysqli_query($con,"update cart set productQty='$productqty' where userId='$userid' and productId='$pid'");
echo "<script>alert('Product aaded in cart');</script>";
  echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
}
} else {
	echo "<script>alert('Product not available on the selected dates');</script>";
  echo "<script type='text/javascript'> document.location ='products.php'; </script>";
}

}}
?>
<!DOCTYPE html>
<html>
<head>
<title>OCRS :: Single Cloth Details</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--webfont-->
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script>
			jQuery(document).ready(function($){

				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 800,
					source_image_height: 1000,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});

			});
		</script>
<link type="text/css" rel="stylesheet" href="css/easy-responsive-tabs.css" />
<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });

        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
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
	<!-- start content -->
	<?php 
$pid=intval($_GET['pid']);
$query=mysqli_query($con,"select tblrentalcloth.ID as pid,tblrentalcloth.Image1,tblrentalcloth.Image2,tblrentalcloth.Image3,tblrentalcloth.Title,category.categoryName,subcategory.subcategoryName as subcatname,tblrentalcloth.CreationDate,tblrentalcloth.updationDate,subcategory.id as subid,tbladmin.username,category.id as catid,tblrentalcloth.ProductCode,tblrentalcloth.Size,tblrentalcloth.Materials,tblrentalcloth.Color,tblrentalcloth.ProductDescription,tblrentalcloth.TermandCond,tblrentalcloth.Priceperday,tblrentalcloth.SecurityAmount,tblrentalcloth.ShippingCharge from tblrentalcloth join subcategory on tblrentalcloth.SubCategory=subcategory.id join category on tblrentalcloth.Category=category.id join tbladmin on tbladmin.id=tblrentalcloth.addedBy where tblrentalcloth.ID='$pid'");
while($row=mysqli_fetch_array($query))
{
?>
	<div class="single">
			<!-- start span1_of_1 -->
			<div class="left_content">
			<div class="span_1_of_left">
				<div class="grid images_3_of_2">
						<ul id="etalage">
							<li>
								
									<img class="etalage_thumb_image" src="admin/productimages/<?php echo htmlentities($row['Image1']);?>" class="img-responsive" />
									<img class="etalage_source_image" src="admin/productimages/<?php echo htmlentities($row['Image1']);?>" class="img-responsive" title="" />
								
							</li>
							<li>
								<img class="etalage_thumb_image" src="admin/productimages/<?php echo htmlentities($row['Image1']);?>" class="img-responsive" />
							
							</li>
							<li>
								<img class="etalage_thumb_image" src="admin/productimages/<?php echo htmlentities($row['Image2']);?>" class="img-responsive"  />
								<img class="etalage_source_image" src="admin/productimages/<?php echo htmlentities($row['Image2']);?>"class="img-responsive"  />
							</li>
						    <li>
								<img class="etalage_thumb_image" src="admin/productimages/<?php echo htmlentities($row['Image3']);?>" class="img-responsive"  />
								<img class="etalage_source_image" src="admin/productimages/<?php echo htmlentities($row['Image3']);?>"class="img-responsive"  />
							</li>
						</ul>
						 <div class="clearfix"></div>		
				  </div>

			<!-- start span1_of_1 -->
			<div class="span1_of_1_des">
				  <div class="desc1">
					<h3><?php echo htmlentities($row['Title']);?>(<?php echo htmlentities($row['ProductCode']);?>) </h3>
					<p><?php echo htmlentities($row['ProductDescription']);?> </p>
					<h5>Rs. <?php echo htmlentities($row['Priceperday']);?> <a href="#">Security Amount: Rs. <?php echo htmlentities($row['SecurityAmount']);?></a></h5>
					<div class="available">
						<h4> Details</h4>
			

 <table class="table table-bordered">

    <tbody>
      <tr>
        <th>Color</th>
        <td><?php echo htmlentities($row['Color']);?></td>
      </tr>
      <tr>
        <th>Size</th>
        <td><?php echo htmlentities($row['Size']);?></td>
      </tr>
      <tr>
        <th>Materials</th>
        <td><?php echo htmlentities($row['Materials']);?></td>
      </tr>
            <tr>
        <th>Shipping Charge</th>
        <td><?php echo htmlentities($row['ShippingCharge']);?></td>
      </tr>
    </tbody>
  </table>


						<div class="btn_form">

							<form method="post">


 <table class="table table-bordered">

    <tbody>
      <tr>
        <th>From Date</th>
        <td><input name="fromdate" type="date" class="textbox" required="true"></td>
      </tr>
      <tr>
        <th>To Date</th>
        <td><input name="todate" type="date" class="textbox" required="true"></td>
      </tr>


 <tr>
 <td><button type="submit" class="btn btn-primary"  type="submit" name="addtocart">Add to Cart</button> </td>
 <td><button type="submit" class="btn btn-primary" type="submit" name="wishlist">Wishlist</button></td>
      </tr>
    </tbody>
  </table>

								
					
								<br>
								<p></p>
                            
							
						</div>
						
						<div class="clearfix"></div></form>
					</div>
					
			   	 </div>
			   	</div>
					<div class="clearfix"></div>
				</div>
			   
			   	<!-- start tabs -->
			    <!--Horizontal Tab-->
        <div id="horizontalTab">
            <ul class="resp-tabs-list">
                <li>Product Details</li>
                <li>Terms & Conditions</li>
                <li>Reviews</li>
                <li>View Reviews</li>
            </ul>
            <div class="resp-tabs-container">
                <div class="tab-content">
                    <p><?php echo htmlentities($row['ProductDescription']);?> . </p>
					
				</div>
               <div class="tab-content">
                    <p class="para"><?php echo htmlentities($row['TermandCond']);?></p>
							
                </div><?php } ?>

                
               <div class="contact-form">
			 	  	 	<h2>Write Review</h2>
			 	 	    <form method="post" action="">
					    	<div>
						    	<span><label>Title for your review*</label></span>
						    	<span><input id="reviewtitle" name="reviewtitle" type="text" class="textbox"></span>
						    </div>
						     <div>
						    	<span><label>Your review*</label></span>
						    	<span><textarea id="review" rows="5" name="preview"> </textarea></span>
						    </div>
						    <div>
						    	<span><label>Your name*</label></span>
						    	<span><input id="name" name="name" type="text" class="textbox"></span>
						    </div>
						    <div>
						     
						    	<span>* Required fields</span>
						    </div>
						  
						   <div>
						   		<span> <button class="btn btn-block sent-butnn" type="submit" name="review">Send</button></span>
						  </div>
					    </form>
				    </div>
				    <div class="tab-content">
                   <?php $ret=mysqli_query($con,"select * from tblreview where Status='Review Accept' and  ProductID='$pid'");
while ($result=mysqli_fetch_array($ret)) {

?>
<p>
	<img src="images/team1.jpg" alt=" " class="img-fluid" width="50" height="50"> <strong><?php echo htmlentities($result['ReviewTitle']);?></strong>(<?php echo htmlentities($result['Review']);?>)<br> by <?php echo htmlentities($result['Name']);?> Date: <?php echo htmlentities($result['DateofReview']);?>
</p>
                                    <?php } ?>
					
				</div>
            </div>
        </div>
					
		         	<!-- end tabs -->
			   	</div>
		
		
          	    <div class="clearfix"></div>
	       </div>	
		   </div>
	<!-- end content -->
	</div>
</div>
</div>	

<?php include_once('includes/footer.php');?>
	
	
</body>
</html>
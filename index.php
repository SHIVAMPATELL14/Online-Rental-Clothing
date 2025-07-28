<?php session_start();
error_reporting(0);
include_once('includes/config.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Cloth Rental System | Home :: Page</title>
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
				<script>
				$("span.menu").click(function(){
				$(".top-menu ul").slideToggle("slow" , function(){
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

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32024393-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<!-- header-section-starts -->
	<div class="user-desc">
		<div class="container">
			<ul>
				
				<?php if($_SESSION['id']==0):?>
                <li><i class="user"></i><a href="account.php">Signin/Signup</a></li><?php endif;?>
                
                <?php if($_SESSION['id']!=0):?>
                <li><a href="checkout.php">Checkout</a></li>
                <?php 
if($_SESSION['id']==0):
?> 
                <li><i class="cart"></i><a href="my-cart.php">Cart (0)</a></li>
                <?php else: 
$uid=$_SESSION['id'];
$ret1=mysqli_query($con,"select id  from cart where cart.userID='$uid' ");
$num1=mysqli_num_rows($ret1);
    ?>  <li><i class="cart"></i><a href="my-cart.php">Cart (<?php echo $num1;?>)</a></li><?php endif; ?>
                 <?php 
if($_SESSION['id']==0):
?> 
                <li><i class="cart"></i><a href="my-wishlist.php">Wishlist (0)</a></li>
                <?php else: 
$uid=$_SESSION['id'];
$ret2=mysqli_query($con,"select id  from wishlist where wishlist.userId ='$uid' ");
$num2=mysqli_num_rows($ret2);
    ?>  <li><i class="cart"></i><a href="my-wishlist.php">Wishlist (<?php echo $num2;?>)</a></li><?php endif; ?><?php endif;?> 
			</ul>
		</div>
		</div>
		<div class="header">
		<div class="header-top">
			<div class="container">
				<div class="logo">
					<a href="index.php"><h3 style="padding-top: 40px;font-size: 50px;">OCRS</h3></a>
				</div>
				<div class="top-menu">
				  <span class="menu"> </span>
					 <ul class="cl-effect-15">
                        <li><a href="index.php" data-hover="HOME">HOME</a></li>

                      
                        <li><a href="products.php" data-hover="PRODUCTS">PRODUCTS</a></li>
                        
                        <li><a href="contact.php" data-hover="CONTACT">CONTACT</a></li>
                          <?php if($_SESSION['id']==0):?>
                        <li><a href="admin/index.php" data-hover="ADMIN">ADMIN</a></li>
                        <?php endif;?>
                    <?php if($_SESSION['id']!=0):?>
                        <li><a href="profile.php" data-hover="PROFILE">PROFILE</a></li>
                        <li><a href="setting.php" data-hover="SETTING">SETTING</a></li>
                        <li><a href="manage-addresses.php" data-hover="MANAGE ADDRESSES">MANAGE ADDRESSES</a></li>
                        <li><a href="my-orders.php" data-hover="ORDER HISTORY">ORDER HISTORY</a></li>
                          <li><a href="logout.php" data-hover="LOGOUT">LOGOUT</a></li>
                      <?php endif;?> 
                    </ul>
				</div>
				 <!--script-nav-->
		
				<!--script-nav-->
				<div class="clearfix"></div>
			</div>
		</div>
			<div class="">
		<div id="ipresenter">



		</div>
	</div>
	</div>
	
<!-- header-section-ends -->
<!-- content-section-starts -->
	<div class="content">
		<div class="sales">
			<div class="container">
						<h1 align="center">Online Cloth Rental System</h1>
						<hr />
				<img src="images/banner1.jpg" width="100%" height="300" />
				<div class="sales-head text-center" style="margin-top:4%">
					<h3>CHECK OUT OUR UNIQUE APPROACH TO <span>FASHION</span></h3>
				</div>
				<div class="sales-grids">
					<div class="col-md-4 sales-grid-a">
						<div class="discount">
							<h4>Sale %60</h4>
						</div>
						<div class="s-img">
							<img src="images/s1.png" alt="" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 sales-grid-b">
						<div class="discount">
							<h4>Free Shipping</h4>
						</div>
						<div class="s-img">
							<img src="images/s2.png" alt="" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 sales-grid-c">
						<div class="discount">
							<h4>24/7 Support</h4>
						</div>
						<div class="s-img">
							<img src="images/s3.png" alt="" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- products-section-starts -->
	  <div class="products-section">
	    <div class="container">
		<div class="product-section-head-text">
		    <h3>RENTAL <span>PRODUCTS</span></h3>
		</div>
		<div class="bottom-grids collections">
				<div class="bottom-grids-left">
					<div class="f-products">
							<!----sreen-gallery-cursual---->
						<div class="sreen-gallery-cursual">
							 <!-- requried-jsfiles-for owl -->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo").owlCarousel({
									        items : 4,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  false,
									        pagination : false,
									      });
									    });
									   </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						       <div id="owl-demo" class="owl-carousel text-center">
					                
					                 <?php 




    $query=mysqli_query($con,"select tblrentalcloth.ID as pid,tblrentalcloth.Image1,tblrentalcloth.Title,tblrentalcloth.Priceperday,tblrentalcloth.ProductDescription,tblrentalcloth.SecurityAmount from tblrentalcloth order by pid desc");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
					                 <div class="item">
					                	<div onclick="location.href='single-cloth-details.php?pid=<?php echo htmlentities($row['pid']);?>';" class="product-grid">
											<div class="product-pic">
		<img src="admin/productimages/<?php echo htmlentities($row['Image1']);?>" title="<?php echo htmlentities($row['Title']);?>"  height="200"/>
											</div>
											<div class="product-pic-info">
												<h4><a href="single-cloth-details.php?pid=<?php echo htmlentities($row['pid']);?>"><?php echo htmlentities($row['Title']);?></a></h4>
												<div class="product-pic-info-price-cart">
													<div class="product-pic-info-price">
														<span>Rs. <?php echo htmlentities($row['Priceperday']);?></span>
													</div>
													<div class="product-pic-info-cart">
														<a class="p-btn" href="single-cloth-details.php?pid=<?php echo htmlentities($row['pid']);?>">View</a>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
					                </div><?php } ?>
					                
					              
				              </div>
						<!--//sreen-gallery-cursual---->
							
					</div>
				</div>
				
		
				</div>
	</div>



	</div>
	</div>












	</div>
	<!-- products-section-ends -->
	
  </div>
   <!-- content-section-ends -->	
   <!-- contact-section-starts -->
	
	<!-- contact-section-ends -->
	<!-- footer-section-starts -->
<?php include_once('includes/footer.php');?>
	<!-- footer-section-ends -->
</body>
</html>
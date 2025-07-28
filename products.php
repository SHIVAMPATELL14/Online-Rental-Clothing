<?php session_start();
error_reporting(0);
include_once('includes/config.php');


?>
<!DOCTYPE html>
<html>
<head>
<title>OCRS || Products</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/component.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Karla:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
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
	   <div class="products-page">
			<div class="product">
				<div class="product-listy">
					<h3>Category</h3>
					<ul class="product-list">
						<?php $query=mysqli_query($con,"select category.id as catid,category.categoryName from category ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
						<li><a href="categorywise-product.php?cid=<?php echo htmlentities($row['catid']);?>"><?php echo htmlentities($row['categoryName']);?></a></li><?php } ?>
						
					</ul>
				</div>
				
				

			</div>
			<div class="new-product">
				
				
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					
					
					<div class="clearfix"></div>
					<ul>
						 <?php 

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
    $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
        }
 
    $total_records_per_page = 12;
    $offset = ($page_no-1) * $total_records_per_page;
    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;
    $adjacents = "2"; 
 
    $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM tblrentalcloth ");
    $total_records = mysqli_fetch_array($result_count);
    $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    $second_last = $total_no_of_pages - 1; // total page minus 1


    $query=mysqli_query($con,"select tblrentalcloth.ID as pid,tblrentalcloth.Image1,tblrentalcloth.Title,tblrentalcloth.Priceperday,tblrentalcloth.ProductDescription,tblrentalcloth.SecurityAmount from tblrentalcloth order by pid desc LIMIT $offset, $total_records_per_page ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?> 
					  <li>
							<a class="cbp-vm-image" href="single-cloth-details.php?pid=<?php echo htmlentities($row['pid']);?>" target="blank">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<img src="admin/productimages/<?php echo htmlentities($row['Image1']);?>" class="img-responsive" alt=""/ width="250" height="200">
									<div class="mask">
			                       		<div class="info"><a href="single-cloth-details.php?pid=<?php echo htmlentities($row['pid']);?>" target="blank">Quick View</a></div>
					                  </div>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title"><?php echo htmlentities($row['Title']);?></p>
									   </div>
									   <div class="pricey">Rs. <?php echo htmlentities($row['Priceperday']);?></div>
									   <div class="clearfix"></div>
								     </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
							<div class="cbp-vm-details">
								<a class="p-btn" href="single-cloth-details.php?pid=<?php echo htmlentities($row['pid']);?>" target="blank">View</a>
							</div>
								
						</li><?php } ?>
						
					</ul>
				</div>
				
 

 <nav aria-label="Pagination">
                        <hr class="my-0">
<ul class="pagination justify-content-center my-4">
    
    <li <?php if($page_no <= 1){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?> class="page-link">Previous</a>
    </li>
       
    <?php 
    if ($total_no_of_pages <= 10){       
        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
            if ($counter == $page_no) {
           echo "<li class='page-link active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
                }
        }
    }
    elseif($total_no_of_pages > 10){
        
    if($page_no <= 4) {         
     for ($counter = 1; $counter < 8; $counter++){       
            if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'> $counter</a></li>";
                }
        }
        echo "<li><a>...</a></li>";
        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
        }
 
     elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {         
        echo "<li><a href='?page_no=1'>1</a></li>";
        echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {         
           if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter' class='page-link'>$counter</a></li>";
                }                  
       }
       echo "<li><a>...</a></li>";
       echo "<li><a href='?page_no=$second_last' class='page-link'>$second_last</a></li>";
       echo "<li><a href='?page_no=$total_no_of_pages' class='page-link'>$total_no_of_pages</a></li>";      
            }
        
        else {
        echo "<li><a href='?page_no=1' class='page-link'>1</a></li>";
        echo "<li><a href='?page_no=2' class='page-link'>2</a></li>";
        echo "<li><a>...</a></li>";
 
        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
           echo "<li class='active'><a>$counter</a></li>";  
                }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                }                   
                }
            }
    }
?>
    
    <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-item disabled'"; } ?>>
    <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?> class="page-link">Next</a>
    </li>
    <?php if($page_no < $total_no_of_pages){
        echo "<li><a href='?page_no=$total_no_of_pages' class='page-link'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
</ul>
 
 </nav>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
   </div>
   <!-- content-section-ends -->	
   <!-- contact-section-starts -->
	<?php include_once('includes/footer.php');?>
</body>
</html>
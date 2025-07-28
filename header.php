<div class="user-desc">
        <div class="container">
            <ul>
                <?php if($_SESSION['id']==0):?>
                <li><i class="user"></i><a href="account.php">Signin/Signup</a></li><?php endif;?>
                
                <?php if($_SESSION['id']!=0):?>
                        <li><i class="user"></i><a href="profile.php">My Profile</a></li>
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

                        <li><a href="setting.php" data-hover="CHANGE PASSWORD">CHANGE PASSWORD</a></li>
                        <li><a href="manage-addresses.php" data-hover="MANAGE ADDRESSES">MANAGE ADDRESSES</a></li>
                        <li><a href="my-orders.php" data-hover="ORDER HISTORY">ORDER HISTORY</a></li>
                          <li><a href="logout.php" data-hover="LOGOUT">LOGOUT</a></li>
                      <?php endif;?> 
                    </ul>
                </div>
                 <!--script-nav-->
                <script>
                $("span.menu").click(function(){
                $(".top-menu ul").slideToggle("slow" , function(){
                });
                });
                </script>
                <!--script-nav-->
                <div class="clearfix"></div>
            </div>
        </div>
        </div>
<!-- header-section-ends -->
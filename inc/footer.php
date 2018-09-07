</div>
<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#"><span>Advanced Search</span></a></li>
						<li><a href="#">Orders and Returns</a></li>
						<li><a href="#"><span>Contact Us</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="faq.php">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.php"><span>Site Map</span></a></li>
						<li><a href="preview.php"><span>Search Terms</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="login.php">Sign In</a></li>
							<li><a href="cart.php">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="faq.php">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+88-01713458599</span></li>
							<li><span>+88-01813458552</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
							<?php
					            $social = $other->selectSocial();
					            if ($social) {
					                while ($result = $social->fetch_assoc()) {
					        ?>
					   		  <ul>
							      <li class="facebook"><a href="<?php echo $result ['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i> </a></li>
							      <li class="twitter"><a href="<?php echo $result ['twtr']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							      <li class="googleplus"><a href="<?php echo $result ['gplus']; ?>" target="_blank"><i class="fa fa-googleplus"></i> </a></li>
							      <li class="contact"><a href="<?php echo $result ['email']; ?>" target="_blank"><i class="fa fa-contact"></i> </a></li>
							      <div class="clear"></div>
						     </ul>
						     <?php } } ?>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<?php
		            $selectCopy = $other->selectCopyright();
		            if ($selectCopy) {
		                while ($result = $selectCopy->fetch_assoc()) {
		        ?> 
				<p> <?php echo $result ['text']; ?> &amp; All rights Reseverd <?php echo date( 'Y');?> </p>
				<?php } } ?>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>


<!DOCTYPE html>
<html class="loading" lang="en">
<?php include 'head.php';?>

<body class="horizontal-layout horizontal-menu 2-columns navbar-floating footer-static">

	<!--================ START: Navbar =================-->
	<?php include 'navbar.php';?>
	<!--================ END: Navbar =================-->
	<!--================ START: Banner =================-->

	<!--================ END: Banner =================-->

	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-body">
				<!--================Header Menu Area =================-->
				<?=$content?>
			</div>
		</div>
		<!--================Blog section End =================-->
		<?php include 'footer.php';?>
		<!-- ================ End footer Area ================= -->
		<?php include 'javascript.php';?>

		<?php
		if(isset($js)){
			echo $js;
		}
	?>
</body>


</html>

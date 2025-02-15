<!DOCTYPE html>
<html class="loading" lang="en">
<?php include 'head.php'?>

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-sticky footer-static">
	<?php include 'header.php';?>
	<?php include 'sidebar.php';?>
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">
			<div class="content-body">
				<!-- page content -->
				<?=$content?>
			</div>
		</div>
	</div>
	<?php include 'footer.php'?>
	<?php include 'javascript.php'?>
	<?php
		if(isset($js)){
			echo $js;
		}
	?>
</body>

</html>
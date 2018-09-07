<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Adminlogin.php';
?>
<?php 
	$alogin = new Adminlogin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminUserName = $_POST['adminUserName'];
		$adminPassword = md5($_POST['adminPassword']);

		$aloginchk = $alogin->AdminLogin($adminUserName, $adminPassword);
	}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
			<span style="color: red; font-size: 18px">
			<?php 
				if (isset($aloginchk)) {
					echo $aloginchk;
				}
			?>
			</span>
			<div>
				<input type="text" placeholder="Username"  name="adminUserName"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="adminPassword"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
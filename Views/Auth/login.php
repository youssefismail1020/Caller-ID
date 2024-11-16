<?php
require_once '../../Models/User.php';
require_once '../../Controllers/AuthController.php';
$errMsg="";
if(isset($_POST['inputPhoneNumber'])&&isset($_POST['inputPassword']))
{
	if(!empty($_POST['inputPhoneNumber'])&&!empty($_POST['inputPassword'])){
		$user=new User;
		$auth=new AuthController;
		$user->phonenumber=$_POST['inputPhoneNumber'];
		$user->password=$_POST['inputPassword'];
		if(!$auth->login($user)){
			if(!session_status()){
			session_start();
			}
			$errMsg=$_SESSION["errMsg"];
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Sign In</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="../dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="../dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="../dist/img/favicon.png" type="image/png" rel="icon">
	</head>
	<body class="start">
		<?php
		if($errMsg!=""){
			?>
			<div class="alert alert-danger fixed-top"role="alert"><?php echo $errMsg; ?></div>
			<?php
		}
		?>
	
		<main>
			<div class="layout">
				<!-- Start of Sign In -->
				<div class="main order-md-1">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>Sign in to CallerID</h1>
									<div class="third-party">
										<button class="btn item bg-blue">
											<i class="material-icons">phone</i>
										</button>
										<button class="btn item bg-teal">
											<i class="material-icons">chat</i>
										</button>
										<button class="btn item bg-purple">
											<i class="material-icons">people</i>
										</button>
									</div>
									<form id="formAuthentication" action="login.php" method="POST">
										<div class="form-group">
											<input type="tel" id="inputPhoneNumber"  name="inputPhoneNumber" pattern="[0]{1}[1]{1}[0-9]{9}" class="form-control" placeholder="Phone Number" required>
											<button class="btn icon"><i class="material-icons">phone</i></button>
										</div>
										<div class="form-group">
											<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
											<button class="btn icon"><i class="material-icons">lock</i></button>
										</div>
										<button type="submit" class="btn button">Sign In</button>
										<div class="callout">
											<span>Don't have account? <a href="sign-up.html">Create Account</a></span>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign In -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-2">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2>Hello, Friend!</h2>
								<p>Enter your personal details and start your journey with CallerID today.</p>
								<a href="sign-up.html" class="btn button">Sign Up</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="../dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="../dist/js/vendor/popper.min.js"></script>
		<script src="../dist/js/bootstrap.min.js"></script>
	</body>

</html>
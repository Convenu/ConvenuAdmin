<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">



<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Panel</title>	
	
	<?php require_once("../include/admin-script.php"); ?>
		
</head>

<body>
	
<div id="wrapper">
	
	<div id="header">
		<br />
		<?php require_once("../include/logo.php"); ?>
	</div> <!-- #header -->	
	
	<div id="nav">	

			<ul class="mega-container mega-grey">
	
				<li class="mega">
					
				</li>
		
				<li class="mega">
					
				</li>
				
				<li class="mega">
					
				</li>
				
			</ul>
		</div>
		 <!-- #nav -->
	
	
	
	<div id="content" class="xfluid">
		
		<div class="portlet x12">
			<div class="portlet-header"><h4>Login Panel</h4></div>
			
			<div class="portlet-content">
				
				
				<?php if (isset($_POST['submit1'])) {
					if($_POST['user']=="admin" and $_POST['password']=="green123") {
									$_SESSION['uname']=$_POST['user'];
									$_SESSION['firstname']="Admin";
									$_SESSION['lastname']=" ";
									echo "<script type=\"text/javascript\">
													document.location=\"admin.php\";
														</script>";
								}
								else{
									$error="Corret Your username and password or contact admin now.!!!!!!!!though u r admin..:P";
								}
							}
						?>
				
				
				<div align="center">
				
				<h1>Admin Login Panel</h1>
				
				<form name="admin" action="" method="post">
					
					<label><font color="#000000">Username:</font></label>
					<input type="text" name="user" id="user" value="" /><br /><br />
				    <label><font color="#000000">Password:</font></label>
					<input type="password" name="password" id="password" value="" /><br /><br />
					<input type="submit" name="submit1" value="Log In" />
					
					</form>
					</div>
					<div align="center">
					<?php if(isset($error)){
									echo "<label style=\"color:#FF0000\">$error</label>";
								}
						 ?>
				</div>
				
				
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				
			
			</div>
		</div>
		

		
	</div> <!-- #content -->
	
	
	<div id="footer">
		
		<?php require_once("../include/footer.php"); ?>
		
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


</body>
</html>
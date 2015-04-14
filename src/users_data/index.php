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
	
	<?php require_once("../include/admin-menu.php"); ?>
		 <!-- #nav -->
	
	
	
	<div id="content" class="xfluid">
		
		<div class="portlet x12">
			<div class="portlet-header"><h4>Admin
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Welcome Admin&nbsp;&nbsp;&nbsp;&nbsp;<a href="../logout">Logout</a>
			</div>
			
			<div class="portlet-content">
				
				<br />
				
				
				<?php if(isset($_SESSION['uname'])) {
					 ?>
				
				
<?php 
					 if(isset($_GET['getuser_id'])) 
			{ ?>	
				
				
				<table cellpadding='0' cellspacing='0' border='0' class='display'>
				<thead>
				<tr>
				<th>Sr.No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Photo</th>
                <th>Member Id</th>
				<th>Type</th>
                <th>Status</th>
				<th>Start Date</th>
                <th>Expiry Date</th>
				<th>Delete</th>
				</tr>
				<tbody>
				
							
					 <?php
					 require_once("../include/db_conn.php");
					 $sql="delete from loginmembers where logID='".$_GET['getuser_id']."'";
					 $delete=mysql_query($sql,$conn);
					 if($delete) {
					 
	
						echo "<font color='#009900' style='display:block;width:500px; font-size:16px; height:auto; background-color:#c7f4be; border-bottom: 1px solid #009900; border-top: 1px solid #009900; border-left: 1px solid #009900; border-right: 1px solid #009900;'><b>Congratulation..Selected User Deleted Successfully.</b></font><br /><br />";
						
					 ?>
	<?php  ?>				 
					 <!-- thermo after delete -->
					<?php
				require_once("../include/db_conn.php");
						$sql="select * from loginmembers order by logID desc";
						$fetch=mysql_query($sql,$conn);
						while ($info=mysql_fetch_array($fetch)) { ?>
				
				<tr class="even gradeC">
					<td><?php echo $info['logID']; ?></td>
					<td><?php echo $info['name']; ?></td>
					<td><?php echo $info['email']; ?></td>
                    
                    <?php if($info['login'] == 'fb') { ?>
                    
					<td><img src="<?php echo $info['photo']; ?>" width="40" height="40" /></td>
                    
                    <?php } else {  ?>
                    
					<td><img src="../../images/<?php echo $info['photo']; ?>" width="40"  height="40"/></td>
                    
                    <?php } ?>
                    <td><?php echo $info['member_id']; ?></td>
                    <td><?php echo $info['member_type']; ?></td>
                    <td><?php echo $info['member_status']; ?></td>
                    <td><?php echo $info['date']; ?></td>
                    <td><?php echo $info['expiry']; ?></td>
					<td><a href="index.php?getuser_id=<?php echo $info['logID']; ?>"><input type="button" name="delete" value="Delete" /></a></td>
				</tr>
				<?php } ?>
					
				
				
			
					 
					 <!-----------thermo after delete ends here ---------->
					 <?php }
					 else {
					 echo "Problem in deleting row. Please try again...<br /><br />";
					 }
					?>
					</table>
					<?php } // if isset idno ends here ?>
				
				<!---------------------------------------------------------------------------------------------------------------------->
				
<?php if(!isset($_GET['getuser_id'])) { ?>				

				<table cellpadding='0' cellspacing='0' border='0' class='display'>
				<thead>
				<tr>
				<th>Sr.No</th>
				<th>Name</th>
				<th>Email</th>
				<th>Photo</th>
                <th>Member Id</th>
				<th>Type</th>
                <th>Status</th>
				<th>Start Date</th>
                <th>Expiry Date</th>
				<th>Delete</th>
				</tr>
				<tbody>
				<?php
				require_once("../include/db_conn.php");
						$sql="select * from loginmembers order by logID desc";
						$fetch=mysql_query($sql,$conn);
						while ($info=mysql_fetch_array($fetch)) { ?>
				
				<tr class="even gradeC">
					<td><?php echo $info['logID']; ?></td>
					<td><?php echo $info['name']; ?></td>
					<td><?php echo $info['email']; ?></td>
                    
                    <?php if($info['login'] == 'fb') { ?>
                    
					<td><img src="<?php echo $info['photo']; ?>" width="40" height="40" /></td>
                    
                    <?php } else {  ?>
                    
					<td><img src="../../images/<?php echo $info['photo']; ?>" width="40"  height="40"/></td>
                    
                    <?php } ?>
                    <td><?php echo $info['member_id']; ?></td>
                    <td><?php echo $info['member_type']; ?></td>
                    <td><?php echo $info['member_status']; ?></td>
                    <td><?php echo $info['date']; ?></td>
                    <td><?php echo $info['expiry']; ?></td>
					<td><a href="index.php?getuser_id=<?php echo $info['logID']; ?>"><input type="button" name="delete" value="Delete" /></a></td>
				</tr>
				<?php } ?>
				</tbody>
				</thead>
				
				</table>
				
				<?php } ?>
				
			<?php } ?>
			
			</div>
		</div>
		

		
	</div> <!-- #content -->
	
	
	<div id="footer">
		
		<?php require_once("../include/footer.php"); ?>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


</body>
</html>
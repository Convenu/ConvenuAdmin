<?php 
session_start();
if(!isset($_SESSION['Rcode'])) { ?>
<script type="text/javascript">
window.location.href="../Login";
</script>

<?php } else {  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Convenu</title>
<?php require_once("../mail.php"); ?>
<?php require_once("../include/script.php"); ?>
<style>
@media only screen and (max-width: 800px) {
	#unseen table td:nth-child(2), 
	#unseen table th:nth-child(2) {display: none; background-color:#FFFFFF;}
}
 
@media only screen and (max-width: 640px) {
	#unseen table td:nth-child(4),
	#unseen table th:nth-child(4),
	#unseen table td:nth-child(7),
	#unseen table th:nth-child(7),
	#unseen table td:nth-child(8),
	#unseen table th:nth-child(8){display: none; background-color:#FFFFFF;}
} </style>
</head>

<body>
<div id="wrap"> 
 
  <?php 
  
    if(!isset($_SESSION['Rcode'])) { ?>

<a href='../Login' style='position: absolute;top:20px;right:0px;z-index:1;width:395px;border:none;'><img src='../images/login.png' style='border:none;'/></a>

  
    
<!--SUB BANNER-->
 <div id="sub_banner" style="height:50px;">
    <div class="container" align="center">
      <a href="http://www.convenu.net">
        <img src="../images/logo.png" height="60" class="alignleft" style="margin-left:285px; margin-top:0px;"/>
      </a>
    
    </div>
  </div>
<?php } ?>



<?php require_once("../include/loginCheck.php"); ?>
  
  <!--SUB BANNER END--> 
  
  <!--SUB CONTENT-->
  <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
        <!-- jQuery is used only for this example; it isn't required to use Stripe -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript">
            // this identifies your website in the createToken call below
            Stripe.setPublishableKey('pk_live_OKZtTmp2INVtTEMFkVXiLiS2');

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    // re-enable the submit button
                    $('.submit-button').removeAttr("disabled");
                    // show the errors on the form
                    $(".payment-errors").html(response.error.message);
                } else {
                    var form$ = $("#payment-form");
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                    // and submit
                    form$.get(0).submit();
                }
            }

            $(document).ready(function() {
                $("#payment-form").submit(function(event) {
                    // disable the submit button to prevent repeated clicks
                    $('.submit-button').attr("disabled", "disabled");

                    // createToken returns immediately - the supplied callback submits the form if there are no errors
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    return false; // submit from callback
                });
            });
        </script>         
  
  <?php ?>
  
  <div id="sub_content">
    <div class="container">
      <div class="contact">
       
   		<!-- tables -->
    	
        <div align="center">
        <font  style="color:#000000; font-size:18px;">Total Cost: $<?php echo $_SESSION['cost']; ?> , Plan: <?php echo $_SESSION['membertype']; ?><br /></font>
        <font  style="color:#000000; font-size:14px;"><a href="index.php">Change Membership Plan</a></font>
        </div><br /><br />
        
        <div align="center">
        <font  style="color:#000000; font-size:32px;">Pay with Paypal</font>
        </div><br />
        
        <div align="center" style="margin-left:-180px;">
   		<table style="background-color:#FFFFFF;border:none;">
		<thead style="background-color:#FFFFFF; border:none;">
		<tr>  
       		<th>
        		<form name="_xclick" action="http://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_xclick">
					<input type="hidden" name="business" value="widgetech.contact@gmail.com">
					<input type="hidden" name="currency_code" value="USD">
					<input type="hidden" name="item_name" value="<?php echo $_SESSION['membertype']; ?>">
					<input type="hidden" name="return" value="http://convenu.net/membership/success.php">
					<input type="hidden" name="cancel_return" value="">
					<input type="hidden" name="rm" value="2">
					<input type="hidden" name="item_number" value="<?php echo $_SESSION['email']; ?>">
					<input type="hidden" name="amount" value="<?php echo $_SESSION['cost']; ?>">
					
                    <input type="image" src="paypal.jpg" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left:180px;">
                     
				</form>
            </th>
            </tr>
            </thead>
            </table>
            </div>
            <br />
            <div align="center">
        	<font  style="color:#000000; font-size:32px;">OR</font>
        	</div><br />
           	
            <div align="center">
        	<font  style="color:#000000; font-size:32px;">Pay with Stripe</font>
        	</div><br />
             		
<?php
require_once("lib/Stripe.php");

if ($_POST) {

			$cost = $_SESSION['cost'] * 100;
				
  Stripe::setApiKey("sk_live_71oIHF8CJviWzmJ4e03vL8ST");
  $error = '';
  $success = '';
  try {
    if (!isset($_POST['stripeToken']))
      throw new Exception("The Stripe Token was not generated correctly");
    Stripe_Charge::create(array("amount" => $cost,
                                "currency" => "usd",
                                "card" => $_POST['stripeToken']));	
  } //try 
  catch (Exception $e) {
    $error = $e->getMessage();
  } //catch
 
 } // if isset post
 $today = date("d-m-Y");
 if($_SESSION['cost'] == 5) { 
 $expiry = date('d-m-Y',strtotime(date("d-m-Y", mktime()) . " + 365 day"));
 } else {   $expiry = '';  }
?>

<?php 
			// inserting all data into new table after the payment is done successfully 		
			if(isset($success)) {
			echo "<div align='center'><strong><font color='009900' style='font-size:18px;'>You have successfully activated your membership.</font></strong></div>";
						$member_id = substr(number_format(time() * rand(),0,'',''),0,10);
						$sql = "Update loginmembers set member_type='".$_SESSION['membertype']."',date ='$today',expiry='$expiry',member_status='active',member_id='$member_id' where email ='".$_SESSION['email']."' ";	
						$update = mysql_query($sql,$conn);
						if($update) {
							echo "<div align='center'><strong><font color='009900' style='font-size:14px;'><a href='../Agreements'>Click Here</a> to go to Agreements Page</font></strong></div>";	
						}
				}
			?>

        <!-- to display errors returned by createToken -->
        <span class="payment-errors"><font size="3" color="#FF0000"><?= $error ?></font></span>
        <span class="payment-success"><font style="font-size:24px;" color="#009900"><?= $success ?></font></span>
        
        <div align="center" style="background-color:#eff0f0; margin-left:250px; width:500px; padding:10px;">         
        <form action="" method="POST" id="payment-form">
            <p class="step">
			
			<table align="center">
            <thead>
            <tr>
            <th>
               <strong>Card Number</strong><br />
               <input type="text" style="width:50%; height:25px;" autocomplete="off" class="card-number" /> (Eg. 4242 4242 4242 4242)
            </th>
            </tr>
            <tr>
			<th> 
               <br /><strong>CVC</strong><br />
               <input type="text" style="width:20%;height:25px;" autocomplete="off" class="card-cvc" /> (Eg. 012)
            </th>
            </tr>
            <tr>
            <th>
               <br /><strong>Expiration (MM/YYYY)</strong><br />
			   <input type="text" style="width:10%;height:25px;" class="card-expiry-month"/> 
               <input type="text" style="width:10%;height:25px;" class="card-expiry-year"/> (Eg. 09  21)
            </th>
            </tr>
            <tr>
            <th>   
               <br /><input type="submit" class="submit-button signup" value="Submit">
			</th>
            </tr>
            </thead>
            </table> 
             </p> 
        </form>
        </div>   
        <!-- -->
      
    </div>
  </div>
  <div class="clear"></div>
  <div class="height15"></div>
  <!--SUB CONTENT END--> 
  
  <!--Footer-->
  <?php require_once("../include/footer.php"); ?>
  <!--ENd Footer--> 
  
</div>


</body>

<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</html>
<?php } ?>
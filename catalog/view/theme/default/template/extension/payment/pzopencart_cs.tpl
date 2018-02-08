
<form name="cs-form" id="cs-form" method="POST">
	<input type="hidden" name="cs_payment_id" id="cs_payment_id" />
	<input type="hidden" name="merchant_order_id" id="order_id" value="<?php echo $cs_merchant_trans_id;?>"/>
	<input type="hidden" name="cs_ret" id="cs_ret" value=""/>
	<div class="buttons">
		<div class="pull-right">	
			<input type="submit" value="<?php echo $button_confirm; ?>" id="button-confirm" name="button-confirm" class="btn btn-primary" onclick='launchICP(); return false;'/>
		</div>
	</div>
</form>
			
<script>
	
var sicp = document.createElement("script");
sicp.id = "context";
sicp.type = "text/javascript";
sicp.src= "#";
<?php if ($cs_module == "Sandbox") {?>
sicp.src = "#";
<?php } ?>			
jQuery("head").append(sicp);
		

function launchICP() {
	
	if(typeof cs == 'undefined') {
		console.log("cs script not loaded");
		return false;
	}
	
	var dataObj = {
		orderAmount:"<?php echo $total;?>",
		currency:"<?php echo $currency;?>",
		phoneNumber:"<?php echo $phone;?>",
		email:"<?php echo $email;?>",
		merchantTxnId:"<?php echo $cs_merchant_trans_id;?>",
		secSignature:"<?php echo $secSignature;?>",
		firstName:"<?php echo $firstname;?>",
		lastName:"<?php echo $lastname;?>",
		addressStreet1:"<?php echo $addr1;?>",
		addressCity:"<?php echo $city;?>",
		addressState:"<?php echo $state;?>",
		addressCountry:"<?php echo $country;?>",
		addressZip:"<?php echo $zip;?>",
		vanityUrl:"<?php echo $cs_vanityurl;?>",
		returnUrl:"<?php echo $redir_url;?>",
		notifyUrl:"<?php echo $notify_url;?>",
		mode:"dropAround"
	};

	//enable the submit order button				
	//jQuery('#button-confirm').prop('disabled', false );	
	
	var configObj = {};
	
	configObj = {
		<?php
		if ($cs_module == "Sandbox")
		{
			 echo "icpUrl: '#',";
		}	
		?>		
 
		eventHandler: function (cbObj) {				
			if (cbObj.event === 'icpLaunched') {
				console.log('Cs ICP pop-up is launched');
			} else if (cbObj.event === 'icpClosed') {
				console.log(JSON.stringify(cbObj.message));				
				console.log('Cs pop-up is closed');
			}
		} 
	};

		
	try 
	{
		cs.launchIcp(dataObj, configObj);
	}
	catch (error) 
	{
		console.log(error);
	}
}

					
//console.log('start timer');
		
//setTimeout(launchICP, 2000);
		
</script>

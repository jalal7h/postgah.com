<?

# jalal7h@gmail.com
# 2016/12/23
# 1.2

function billing_management_methods(){
	
	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'save':
			billing_management_methods_config_save();
			break;
			
		case 'form':
			return billing_management_methods_config_form();

		case 'install':
			billing_management_methods_install();
			break;

		case 'uninstall':
			billing_management_methods_uninstall();
			break;
			
	}

	#
	# form
	echo "<div class='billing_management_methods'>";
	
	if(! sizeof($GLOBALS['billing_method']) ){
		echo convbox( __("هنوز درگاهی نصب نشده است") );
	
	} else foreach( $GLOBALS['billing_method'] as $method => $name ){
		
		if( $method == 'wallet' ){
			continue;
		}

		$cost = number_format( billing_stat_payment( array("method" => $method) ) );

		if(!$rs = dbq(" SELECT * FROM `billing_method` WHERE `method`='$method' LIMIT 1 ")){
			e(__FUNCTION__.__LINE__);
		
		} else if(!dbn($rs)){
			// $installed = false;
			$inputs = "
			<input type='button' class='btn btn-primary' value='".__('نصب')."' onclick='location.href=\"./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=install&method=".$method."\"' />";
		
		} else {
			// $installed = true;
			$rw = dbf($rs);
			$inputs = "
			<input type='button' class='btn btn-primary' value='".__('تنظیمات')."' onclick='location.href=\"./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=form&method=".$method."\"' />
			<input type='button' class='btn btn-primary' value='".__('لغو')."' onclick='location.href=\"./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=uninstall&method=".$method."\"' />";
		}

		echo "<div class=r >
			<img src='image_list/billing_".$method.".png' />
			<span>".__("دریافتی")." : ".billing_format($cost)."</span>
			<div class='input-box'>".$inputs."</div>
		</div>";

	}
	
	echo "</div>";
}



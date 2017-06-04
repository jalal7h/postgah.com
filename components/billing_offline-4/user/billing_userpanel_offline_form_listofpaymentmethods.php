<?php

# jalal7h@gmail.com
# 2017/06/02
# 1.0

function billing_userpanel_offline_form_listofpaymentmethods(){
	
	#
	# offline methods
	if(! $rs_off = dbq(" SELECT * FROM `billing_method` WHERE `c5`='offline' ORDER BY `id` DESC ") ){
		e();
	
	} else if(! dbn($rs_off) ){
		// nothing
	
	} else {
		
		$method_str_offline = "<div style='clear: both; float: none;'></div><h1 style='border-top: 1px dashed #ccc; padding-top: 27px;'>".__("آفلاین")."</h1>";
		
		while( $rw_off = dbf($rs_off) ){
			$method_str_offline.= "
			<label class='r offline'>
				<input title='".$rw_off['c1']."' type='radio' name='method' value='".$rw_off['method']."' />
				<span class='c1'>".$rw_off['c1']."</span>
			    <div class='c-container'>
					<span class='c2'>".__("حساب").":‌ ".$rw_off['c2']."</span>
					<span class='c3'>".__("کارت").":‌ ".$rw_off['c3']."</span>
				</div>
			</label>";
		}

	}

	return $method_str_offline;

}


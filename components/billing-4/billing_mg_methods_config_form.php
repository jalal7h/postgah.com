<?

function billing_management_methods_config_form(){
	
	if(! $method = $_REQUEST['method'] ){
		e();
	
	} else if(! $rs = dbq(" SELECT * FROM `billing_method` WHERE `method`='$method' LIMIT 1 ") ){
		e();
	
	} else if(! dbn($rs) ){
		e();
	
	} else if(! $rw = dbf($rs) ){
		e();
	
	} else {
		echo "
		<form class='billing_management_methods_config_form' method='post' action='./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=save&method=".$_REQUEST['method']."' >

		<div>
			<span>ضریب واحد پولی</span>
			<input type='text' name='datafield[unit]' value='".$rw['unit']."' />
		</div>

		<div>
			<span>شناسه پایانه</span>
			<input type='text' name='datafield[terminal_id]' value='".$rw['terminal_id']."' />
		</div>
		
		<div>
			<span>نام کاربری</span>
			<input type='text' name='datafield[terminal_user]' value='".$rw['terminal_user']."' />
		</div>
		
		<div>
			<span>گذرواژه</span>
			<input type='text' name='datafield[terminal_pass]' value='".$rw['terminal_pass']."' />
		</div>
		
		<div>
			<span>کد ویژه ۱</span>
			<input type='text' name='datafield[c1]' value='".$rw['c1']."' />
		</div>
		
		<div>
			<span>کد ویژه ۲</span>
			<input type='text' name='datafield[c2]' value='".$rw['c2']."' />
		</div>
		
		<div>
			<span>کد ویژه ۳</span>
			<input type='text' name='datafield[c3]' value='".$rw['c3']."' />
		</div>
		
		<div>
			<span>کد ویژه ۴</span>
			<input type='text' name='datafield[c4]' value='".$rw['c4']."' />
		</div>

		<hr>

		<div>
			<span>&nbsp;</span>
			<input type='submit' class='submit_button' value='ثبت تغییرات'/>
		</div>
		
		</form>";

		return true;
	}

	return false;
}





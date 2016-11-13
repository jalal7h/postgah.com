<?

# jalal7h@gmail.com
# 2016/08/28
# 1.0

function mss_mg_client_form(){
	
	if(! dbr(dbq(" SELECT COUNT(*) FROM `mailserverselector_provider` "),0,0) ){
		echo convbox( __("هنوز ارسال‌کننده ای ثبت نشده است<br>لطفا ابتدا نسبت به %%ثبت ارسال‌کننده جدید%% اقدام نمائید", ["<a href=\"./?page=admin&cp=setting_mg&func=mss_mg&do=form\" target=\"_blank\">","</a>"] ) );
		return true;
	}

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "mailserverselector_func" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&func2=".$_REQUEST["func2"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			<div class="lmfe_inDiv">
				<span class="lmfe_tnit">'.lmtc("mailserverselector_func:name").'</span>
				<?=$rw["name"]?>
			</div>
			

			[!"'.lmtc('mailserverselector_provider')[0].'", "select:mailserverselector_provider_id","option"=>"<option value=0></option>".listmaker_option( "mailserverselector_provider", $condition="", $returnArray=false )!]
			
			<hr>
			
		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}



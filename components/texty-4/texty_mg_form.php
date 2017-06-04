<?

# jalal7h@gmail.com
# 2016/12/23
# 1.4

function texty_mg_form(){

	if(! $id_texty = $_REQUEST['id'] ){
		ed();
		
	} else if(! $rw = table('texty', $id_texty) ){
		echo convbox( __('موردی با این شناسه یافت نشد'), 'red' );
		return false;
	}

	if( $rw['flagstring'] == '' ){
		$rw['flagstring'] = '1110011';
	}

	if(! $rw['user_title'] ){
		if( substr( $rw['flagstring'] , 3, 2 ) == '00' ){
			$rw['user_title'] = __('کاربر');

		} else {
			$rw['user_title'] = __('کاربر حاضر');
		}
	}
	if(! $rw['user2_title'] ){
		$rw['user2_title'] = __('کاربر غایب');
	}

	$rw['user_title'] = __($rw['user_title']);
	$rw['user2_title'] = __($rw['user2_title']);


	## -------------------------------------------------
	echo listmaker_form('
		
		<div class="texty_mg_head">'.( $GLOBALS['cmp']['texty_mg'] ? $GLOBALS['cmp']['texty_mg'] : $GLOBALS['setting']['texty_mg'] ).' / <?=__($rw["name"])?></div><hr>
		
		[!
			"table" => "texty" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
		[!"hidden:slug"!]

			'.( $rw['flagstring'][0] ? '[!"textarea:prompt"!]<hr>' : '' ).'
			
			'.( $rw['flagstring'][1] ? '
				<div class="half_div">
					[!"text:user_email_subject","'.__('عنوان ایمیل %%', [$rw['user_title']] ).'"!]
					[!"textarea:user_email_content","'.__('متن ایمیل %%', [$rw['user_title']] ).'"!]
				</div>' : '' ).

			( $rw['flagstring'][2] ? '<div class="half_div">[!"textarea:user_sms","notInDiv","'.__('پیامک %%', [$rw['user_title']] ).'"!]</div>' : '' ).
	
			( ($rw['flagstring'][1] or $rw['flagstring'][2]) ? '<hr>' : '' ).

			( $rw['flagstring'][3] ? '<div class="half_div">
				[!"text:user2_email_subject","'.__('عنوان ایمیل %%', [$rw['user2_title']] ).'"!]
				[!"textarea:user2_email_content","'.__('متن ایمیل %%', [$rw['user2_title']] ).'"!]
			</div>' : '' ).

			( $rw['flagstring'][4] ? '<div class="half_div">[!"textarea:user2_sms","notInDiv","'.__('پیامک %%', [$rw['user2_title']] ).'"!]</div>' : '' ).
	
			( ($rw['flagstring'][3] or $rw['flagstring'][4]) ? '<hr>' : '' ).

			( $rw['flagstring'][5] ? '<div class="half_div">
				[!"text:admin_email_subject"!]
				[!"textarea:admin_email_content"!]
			</div>' : '' ).

			( $rw['flagstring'][6] ? '<div class="half_div">
				<br>
				[!"textarea:admin_sms","notInDiv"!]
			</div>' : '' ).
	
			( ($rw['flagstring'][5] or $rw['flagstring'][6]) ? '<hr>' : '' ).

		'
		<div>
		[!"submit:'.__('ثبت').'","notInDiv"!]
		<span class="vars"><?
			if( trim($rw["vars"]) ){
				echo "<div>'.__('متغیرهای مورد استفاده در این پیام ها').'</div>";
				echo "<span>".str_replace(" ","</span> <span>", trim($rw["vars"]) )."</span>";
			}
			?></span>
		</div>

	');
	## -------------------------------------------------

}



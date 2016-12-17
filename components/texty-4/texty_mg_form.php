<?

# jalal7h@gmail.com
# 2016/12/17
# 1.2

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
			$rw['user_title'] = 'کاربر';

		} else {
			$rw['user_title'] = 'کاربر حاضر';
		}
	}
	if(! $rw['user2_title'] ){
		$rw['user2_title'] = 'کاربر غایب';
	}


	## -------------------------------------------------
	echo listmaker_form('
		
		<div class="texty_mg_head">'.( $GLOBALS['cmp']['texty_mg'] ? $GLOBALS['cmp']['texty_mg'] : $GLOBALS['setting']['texty_mg'] ).' / <?=$rw["name"]?></div><hr>
		
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
					[!"text:user_email_subject","'.lmtc('texty:user_email_subject').' '.$rw['user_title'].'"!]
					[!"textarea:user_email_content","'.lmtc('texty:user_email_content').' '.$rw['user_title'].'"!]
				</div>' : '' ).

			( $rw['flagstring'][2] ? '<div class="half_div">[!"textarea:user_sms","notInDiv","'.lmtc('texty:user_sms').' '.$rw['user_title'].'"!]</div>' : '' ).
	
			( ($rw['flagstring'][1] or $rw['flagstring'][2]) ? '<hr>' : '' ).

			( $rw['flagstring'][3] ? '<div class="half_div">
				[!"text:user2_email_subject","'.lmtc('texty:user2_email_subject').' '.$rw['user2_title'].'"!]
				[!"textarea:user2_email_content","'.lmtc('texty:user2_email_content').' '.$rw['user2_title'].'"!]
			</div>' : '' ).

			( $rw['flagstring'][4] ? '<div class="half_div">[!"textarea:user2_sms","notInDiv","'.lmtc('texty:user2_sms').' '.$rw['user2_title'].'"!]</div>' : '' ).
	
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

			'[!"submit:'.__('ثبت').'","inDiv"!]

		[!close!]
	');
	## -------------------------------------------------

}



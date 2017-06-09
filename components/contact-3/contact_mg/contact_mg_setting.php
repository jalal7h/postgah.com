<?

# jalal7h@gmail.com
# 2017/01/21
# 1.0

add_setting('contact_mg_setting','ارتباط با ما');

function contact_mg_setting(){
	
	switch ($_REQUEST['do']) {
		case 'saveNew':
			contact_mg_setting_save();
			break;
	}


	if(! $rs = dbq(" SELECT * FROM `setting` WHERE `slug` LIKE 'contact_email_address_%' ORDER BY `slug` ") ){
		e();
	} else if(! dbn($rs) ){
		e();
	} else while( $rw = dbf($rs) ){
		$old_email_address.= '[!"email:contact_email_address[]"=>"'.$rw["text"].'","'.__('آدرس ایمیل').'"!]'."\n";
	}

	# -------------------------------------------------
	echo listmaker_form('
		[!"table" => "setting","rw" => setting_rw_slug_n_text()!]
			
			<div>
				[!"'.setting_rw('contact_tell')['name'].'","text:contact_tell"!]
				[!"'.setting_rw('contact_cell')['name'].'","text:contact_cell"!]
				[!"'.setting_rw('contact_fax')['name'].'","text:contact_fax"!]
				[!"'.setting_rw('contact_address')['name'].'","textarea:contact_address"!]
			</div>

			<div>
				'.$old_email_address.'
				[!"email:contact_email_address+","'.__('آدرس ایمیل').'"!]
			</div>

			<hr>
	
		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------

}



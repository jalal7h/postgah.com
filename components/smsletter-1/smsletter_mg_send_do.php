<?

function cellletter_mg_send_do(){

	if(! $text = trim(strip_tags($_REQUEST['text'])) ){
		e();	
			
	} else {

		if( $_REQUEST['user_cell_list']=='1' ){
			if(! $rws = table(array( 'user' , 'cell' , " AND `cell` LIKE '%9%' " )) ){
				;//
			} else if(! sizeof($rws) ){
				;//
			} else foreach ($rws as $k => $rw) {
				if(! $cell = trim($rw['cell']) ){
					continue;
				} else {
					$list_of_cell_addresses[ $cell ] = true;
				}
			}
		}

		if( $numb = $_REQUEST['numb'] ){
			$numb = str_replace( array('،',"
","\n","\r\n") , ",", $numb );
			$numb = explode(",", $numb);
			foreach ($numb as $k => $cell) {
				if(! $cell = trim($cell) ){
					continue;
				} else {
					$list_of_cell_addresses[ $cell ] = true;
				}
			}
		}

		if( sizeof($list_of_cell_addresses)){
			foreach ($list_of_cell_addresses as $k => $r) {
				if(! strstr($k, '9')){
					continue;
				} else {
					$list[] = $k;
					$i++;
				}
			}
			
			sms_send( $list_of_cell_addresses , $text );

			echo convbox( __('ارسال پیامک به %% شماره با موفقیت انجام شد', [$i] ) );
			
		}

	}

}


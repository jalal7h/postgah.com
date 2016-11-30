<?

function ticketbox_mg_form_replies(){
	
	if(! $uid = user_logged() ){
		ed();

	} else if(! $id = $_REQUEST['id'] ){
		return true;
	
	} else if(! $rs = dbq(" SELECT * FROM `ticketbox_post` WHERE `tid`='$id' ORDER BY `date` DESC ") ){
		e();
	
	} else {
		echo "
		<div style='clear:both;'></div>
		<div class='ticketbox_mg_form_replies' >";
		while($rw = dbf($rs)){
			# date
			$date = u2vaght($rw['date']);
			$date = substr($date, 0, 16);
			# text
			$text = $rw['text'];
			$text = strip_tags($text);
			$text = trim($text);
			$text = nl2br($text);
			# echo
			echo "
			<div class='r".($rw['uid']==0?" admin":"")."'>
				<div class='info'>
					<span class='user-name'>".( $rw['uid']==0 ? __("مدیریت") : __("کاربر") )."</span>
					<span class='date'>$date</span>
				</div>
				<div class='text'>$text</div>
			</div>";
		}

		echo "</div>";

	}

	dbs('ticketbox', ['view_by_admin'=>'1'], ['id'] );

}


<?

function ezTicket_user_form_replies(){
	
	if(! $uid = user_logged() ){
		ed();
	
	} else if(! $id = $_REQUEST['id'] ){
		return true;
	
	} else if(! $rs = dbq(" SELECT * FROM `ezticket_reply` WHERE `tid`='$id' ORDER BY `date` DESC ") ){
		e();
	
	} else {
		
		echo "
		<div style='clear:both;'></div>
		<div class='ezTicket_user_form_replies' >";
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

	dbs('ezticket_ticket', [ 'view_by_user'=>'1' ], [ 'id', 'uid'=>$uid ] );

}







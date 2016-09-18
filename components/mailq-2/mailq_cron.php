<?

# jalal7h@gmail.com
# 2016/09/18
# 1.1

$GLOBALS['do_action'][] = 'mailq_cron';

function mailq_cron(){
	
	$limit = 1;
	
	if(! $rs = dbq(" SELECT * FROM `mailq` WHERE 1 ORDER BY `id` ASC LIMIT $limit ") ){
		dg();
	
	} else if(! dbn($rs) ){
		echo "no record to send";

	} else while( $rw = dbf($rs) ){
		
		$to = $rw['to'];
		$subject = $rw['subject'];
		$text = $rw['text'];
		$from = $rw['mail_from'];
		$html = $rw['html'];
		$mssp_id = $rw['mssp_id'];

		xmail( $to , $subject , $text , $from , $html, $mssp_id );
		
		if(! dbq(" DELETE FROM `mailq` WHERE `id`='".$rw['id']."' LIMIT 1 ") ){
			dg();
		}

	}
}






<?

# jalal7h@gmail.com
# 2016/12/02
# 1.0

$GLOBALS['do_action'][] = 'listmaker_form_element_this_searchbox_load';

function listmaker_form_element_this_searchbox_load(){
	
	if(! $text = $_REQUEST['text'] ){
		e();
		
	} else if(! $feed = $_REQUEST['feed'] ){
		e();
		
	} else if(! $feed = str_dec($feed) ){
		e();
		
	} else if(! $feed = explode('/', $feed) ){
		e();
		
	} else if( sizeof($feed) != 4 ){
		e();
		
	} else {
		
		$feed_table = $feed[0];
		$feed_title_column = $feed[1];
		$feed_id_column = $feed[2];
		$hash = $feed[3];

		$new_hash = $feed_table."/".$feed_title_column."/".$feed_id_column;
		$new_hash = md5x( $new_hash, 8 );
		
		if( $hash != $new_hash ){
			ed();

		} else if(! $rs = dbq(" SELECT * FROM `$feed_table` WHERE `$feed_title_column` LIKE '$text%' LIMIT 15 ") ){
			e();

		} else if(! dbn($rs) ){
			e();

		} else while( $rw = dbf($rs) ){
			echo "<div the_id=\"".$rw[ $feed_id_column ]."\">".$rw[ $feed_title_column ]."</div>";
		}

	}

}





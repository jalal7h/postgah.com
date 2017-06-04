<?

# jalal7h@gmail.com
# 2016/12/21
# 1.2

function listmaker_form_element_this_searchbox( $info ){
	
	$tnit_c = lmfe_tnit( $info );
	$c.= $tnit_c;
	
	$id = $info['id'] ? $info['id'] : "lmfe_".$info['formName']."_".$info['name'];
	$id = listmaker_uniqId( $id );
	
	$feed = $info['feed'];
	$feed = str_replace( ['(',')','[',']'], ' ', $feed);
	$feed = explode(' ', $feed);
	$feed_table = $feed[0];
	$feed_title_column = $feed[1];
	$feed_id_column = $feed[3];

	$js_feed = $feed_table."/".$feed_title_column."/".$feed_id_column;
	$js_feed.= "/".md5x( $js_feed, 8 );
	$js_feed = str_enc( $js_feed );

	if( $info['value'] ){
		$memo_value = table( $feed_table, $info['value'], $feed_title_column, $feed_id_column);
	}
	
	# 
	# remove the class lmfe_isNeeded and add it to hidden input
	if( $info['isNeeded'] ){
		$info['class'] = str_replace( 'lmfe_isNeeded', '', $info['class'] );
	}

	$info['class'].= " lmfe_searchbox";
	$info['class'] = trim($info['class']);

	$c.= "<input type=\"hidden\" name=\"".$info['name'].( $info['ArrayInput'] ? '[]' : '' )."\" value=\"".$info['value']."\"".( $info['isNeeded'] ? " class=\"lmfe_isNeeded\"" : '' )." />";

	$c.= "<input autocomplete=\"off\" type=\"text\" id=\"".$id."\" ".
		( $info['class'] ? "class=\"".$info['class']."\" " : '' ).
		( $info['etc'] ? $info['etc']." " : '' ).
		( $memo_value ? "value=\"".$memo_value."\" " : '' ).
		( $info['TitleInTag'] ? "placeholder=\"".$info['placeholder']."\" " : 
			( $info['placeholder'] ? "placeholder=\"".$info['placeholder']."\" " : '' )
		 ).
		"/>\n";

	$c.= "<div nav=\"0\" text_loading=\"".__('بارگزاری ...')."\" js_feed=\"$js_feed\" class=\"list\" lang_dir=\"".lang_dir."\" ></div>";

	$c.= "<icon></icon>";


	if( $tnit_c ){
		$c = $c.'<span class="lmfe_tnit" ></span>';
	}


	return $c;

}





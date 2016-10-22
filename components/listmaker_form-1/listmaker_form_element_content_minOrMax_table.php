<?

# jalal7h@gmail.com
# 2016/10/19
# 1.0

function listmaker_form_element_content_minOrMax_table( $info ){

	$c_min = listmaker_form_element_content_minOrMax_table_this( $info, 'min' );
	$c_max = listmaker_form_element_content_minOrMax_table_this( $info, 'max' );
	
	if( $c_min and $c_max ){
		$c = $c_min."، ".$c_max;
	
	} else {
		$c = $c_min.$c_max;
	}
	
	if( $c ){
		$c = "<span class=\"lmfe_minOrMax\">\n" . $c . "</span>\n";
	}
	
	return $c;

}

function listmaker_form_element_content_minOrMax_table_this( $info, $minOrMax ){

	$lng = [
		'min' => 'حداقل',
		'max' => 'حداکثر',
		'c' => 'کاراکتر',
		'w' => 'کلمه',
	];

	if(! in_array( $minOrMax, ['min','max'] ) ){
		return '';

	} else if( $info['content_'.$minOrMax] ){
		
		if( is_numeric($info['content_'.$minOrMax]) ){
			$content_min_type = "c";
			$content_min_numb = $info['content_'.$minOrMax];
		
		} else {
			$content_min_type = substr($info['content_'.$minOrMax],-1);
			$content_min_numb = substr($info['content_'.$minOrMax],0,-1);
		}

		$val = $info['value'];
		$count_in_val['c'] = mb_strlen( trim( $val ) );
		$count_in_val['w'] = sizeof( explode(" ", trim( str_replace(".", " ", $val) ) ) );

		$cur_class_name = 'count_of_current_'.$content_min_type;
		$c.= "<span class=\"limit\">".$lng[$minOrMax]." ".$content_min_numb." ".$lng[$content_min_type]."</span>\n";
		$c.= "<span class=\"cur\"><span class=\"".$cur_class_name."\">".$count_in_val[$content_min_type]."</span> ".$lng[$content_min_type]."</span>\n";

	}

	return $c;

}




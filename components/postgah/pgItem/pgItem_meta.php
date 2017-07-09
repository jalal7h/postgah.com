<?php

# jalal7h@gmail.com
# 2017/06/23
# 1.0

function pgItem_meta( $key ){
	
	if(! $rw = pgItem_fetch() ){
		d404();
	}

	switch( $key ){
		
		case 'title':
			return $rw['name'];

		case 'kw':
		    $kw_arr = kwordusage_get( "item", $rw['id'] );
		    if( sizeof($kw_arr) ){
			    for($i=0; $i<10; $i++){
			    	$kw[] = $kw_arr[$i];
			    }
			    $kw = implode(',', $kw);
			}
			return $kw;

		case 'desc':
			$desc = mb_substr( $rw['text'] , 0 , 170 );
			$desc = nl2br($desc);
			$desc = str_replace("<br/>", " ", $desc);
			$desc = trim( $desc );
			return $desc;

	}

}


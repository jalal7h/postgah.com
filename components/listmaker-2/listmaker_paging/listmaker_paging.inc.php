<?

# jalal7h@gmail.com
# 2017/02/13
# 1.10

/*
echo listmaker_paging( " SELECT * FROM `posts` WHERE 1 " , "http://site.com/p=%%", 10 );

az in query list e shomare page ha ro mide faghat
ino mizanim zire list

albate tu listmaker_list, in khdoesh call mishe.

/*README*/

function listmaker_paging($__query, $__link, $tdd=10, $debug=false){

	if( $tdd == 0 ){
		return '';
	}

	$page_number_field = $__link;
	
	if(strstr($page_number_field, "=%%")){
		$page_number_field = explode("=%%", $page_number_field);
		$page_number_field = $page_number_field[0];
		$page_number_field = strrev($page_number_field);
		$page_number_field = explode("&", $page_number_field);
		$page_number_field = $page_number_field[0];
		$page_number_field = strrev($page_number_field);
	
	} else if(substr(strrev($page_number_field), 0, 1)=="="){
		$page_number_field = strrev($page_number_field);
		$page_number_field = explode("&", $page_number_field);
		$page_number_field = $page_number_field[0];
		$page_number_field = strrev($page_number_field);
		$page_number_field = explode("=", $page_number_field);
		$page_number_field = $page_number_field[0];
	
	} else if(strstr($page_number_field, "%%")){
		$page_number_field = "p";
	
	} else {
		$page_number_field = "p";
		if(strstr($__link, "?")){
			$__link.= "&".$page_number_field."=";
		} else {
			$__link.= "?".$page_number_field."=";
		}
	}
	
	// e("paging - ".__LINE__." : ".$page_number_field);
	$p = intval($_REQUEST[$page_number_field]);
	
	$cnt = listmaker_paging__count( $__query );

	$pge = ceil($cnt / $tdd);
	
	if( $pge > 1 ){
		
		$c.= "<div class='listmaker_list_paging' >";
		$c.= __("صفحه :")." ";
		
		for( $i=0; $i<$pge; $i++ ){
			
			if( $pge>10 ){
				
				if( $i >= $pge-5 ){
					;// do
				
				} else if( $i<=5 ){
					;// do
				
				} else if( $i >= $p+5 ){
					if(! $second1 ){
						$c.= " &nbsp; ... &nbsp; ";
						$second1 = true;
					}
					continue;
				
				} else if( $i <= $p-5 ){
					if(! $second2 ){
						$c.= " &nbsp; ... &nbsp; ";
						$second2 = true;
					}
					continue;
				}
			}
			
			if( strstr($__link, "%%") ){
				$link = str_replace("%%", $i, $__link);
			
			
			} else {
				$link = $__link.$i;
			}
			
			if( $p == $i ){
				$c.= "<b style=''>".($i+1)."</b> ";
			
			} else {
				$c.= "<a href='".$link."' >".($i+1)."</a> ";
			}
		}
		$c.= "</div>";
	}
	
	return $c;
}

function listmaker_paging__count( $query ){

	if( is_numeric($query) ){
		return $query;
	}

	# 
	# normal query
	if(! stristr( $query , 'UNION' ) ){
		
		$query = str_ireplace(" * "," COUNT(*) ",$query);
		if(stristr($query, " LIMIT ")){
			$query = explode(' LIMIT ',$query)[0];
		}
		if(stristr($query, " ORDER BY ")){
			$query = explode(' ORDER BY ',$query)[0];
		}
		if(stristr($query, " GROUP BY ")){
			$query = explode(' GROUP BY ',$query)[0];
		}

		// echo $query;

		if(! $rs = dbq($query) ){
			echo __FUNCTION__." - ".__LINE__." - ".dbe();
		
		} else {
			$numb = dbr( $rs, 0, 0 );
		}
	
	#
	# UNION table
	} else {
		$query = str_ireplace( " * ", " `id` ", $query );
		
		if(! $rs = dbq($query) ){
			echo __FUNCTION__." - ".__LINE__." - ".dbe();
			echo "<hr>".$query;
		
		} else {
			$numb = dbn( $rs );
		}
	}

	qpush( 'listmaker_paging__count', $numb );

	return $numb;

}





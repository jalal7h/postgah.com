<?php

# jalal7h@gmail.com
# 2017/01/06
# 1.0

function linkify( $lc_name, $class ){

	if(! $lc_name ){
		e();

	} else if(! $rw = table( 'linkify_config', [ 'name' => $lc_name ] )[0] ){
		e();

	} else if(! $lf = linkify_get( $rw['id'] ) ){
		e();

	} else {
		
		$c.= "\n\t<div class=\"".__FUNCTION__."_".$class."\" lang_dir=\"".lang_dir."\" >\n";
		$c.= linkify_display_this( $lf['items'], $lf['haveSub'], $lf['haveIcon'] );
		$c.= "\t</div>\n";

	}

	return $c;
}


function linkify_display_this( $items, $haveSub, $haveIcon, $count_of_tab=null ){

	if( $count_of_tab === null ){
		$its_master = true;
		$count_of_tab = 2;
	}

	$t = str_repeat( "\t", $count_of_tab );

	foreach( $items as $i => $item ){
		
		$c.= $t."<div class=\"".( $its_master ? 'master' : 'sub' )."\" >\n";
		
		$item_url = $item['url'];
		$item_url = linkify_URL_remove($item['url']);
		$item_icon = $item['pic'];

		$item_name = $item['name'];
		
		if( $haveIcon and $item_icon ){
			$c.= $t."\t<a href=\"$item_url\">\n".
				 $t."\t\t<img src=\"$item_icon\"/>\n".
				 $t."\t\t".$item_name."\n".
				 $t."\t</a>\n";
				 
		} else {
			$c.= $t."\t<a href=\"$item_url\">$item_name</a>\n";			
		}
		
		if( $haveSub and $item['items'] ){
			$c.= $t."\t<span class=\"sub_w\">\n";
			$c.= linkify_display_this( $item['items'], $haveSub, $haveIcon, $count_of_tab+2 );
			$c.= $t."\t</span>\n";
		}


		$c.= $t."</div>\n";	

	}
	

	return $c;

}









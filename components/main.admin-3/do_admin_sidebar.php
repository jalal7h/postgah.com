<?

# jalal7h@gmail.com
# 2016/07/11
# 2.1

function do_admin_sidebar(){

	echo "\n\n<div class=\"sidebar-wrapper\">\n";
	echo "\t<div class=\"sidebar\">\n";

	$rand = "dasi".rand(10000000,99999999);
	echo "\n\t\t<a href=\""._URL."/?page=admin\"><icon id=\"".$rand."\"></icon>".__("پیشخوان")."</a>\n";
	echo "\t\t<style> #".$rand.":before { content: \"\\f0e4\" }</style>\n\n";

	foreach ($GLOBALS['cmp'] as $func => $name ) {
		if( (! is_component('useraccess')) or useraccess( admin_logged(), $func) ){
			do_admin_sidebar_this( $func, $name );
		}
	}

	echo "\t</div>\n";
	echo "</div>\n\n";
	
}


function do_admin_sidebar_this( $func, $name ){
	
	if(! $icon_code = $GLOBALS['cmp-icon'][ $func ] ){
		$icon_code = '1b2';
	}

	if( substr($func, 0, 15)=='cat_management&' ){
		$cat_name = substr($func, 17);
		if( $GLOBALS['cat_items'][ $cat_name ][1] ){
			if( $GLOBALS['cat_items'][ $cat_name ][1]!==true ){
				$icon_code = $GLOBALS['cat_items'][ $cat_name ][1];
			}
		}
	
	} else if( substr($func, 0, 11)=='linkify_mg&' ){
		$linkify_name = substr($func, 13);
		if( $GLOBALS['linkify_items'][ $linkify_name ]['inDashboard'] ){
			if( $GLOBALS['linkify_items'][ $linkify_name ]['inDashboard']!==true ){
				$icon_code = $GLOBALS['linkify_items'][ $linkify_name ]['inDashboard'];
			}
		}
	}

	$rand = "dasi".rand(10000000,99999999);
	echo "\t\t".'<a'.( $func==$_REQUEST['cp'] ? ' class="current"' : '' ).' href="'._URL.'/?page=admin&cp='.$func.'"><icon id="'.$rand.'"></icon><span>'.$name.'</span></a>'."\n";
	echo "\t\t<style> #".$rand.":before { content: \"\\f".$icon_code."\" }</style>\n\n";

}






<?

# jalal7h@gmail.com
# 2016/12/31
# 2.3

function do_admin_sidebar(){

	?>
	<div class="sidebar-wrapper">
	<div class="sidebar">
	<?

	$rand = "dasi".rand(10000000,99999999);
	
	?>
	<a href="<?=_URL?>/admin"><icon id="<?=$rand?>" ></icon><?=__("پیشخوان")?></a>
	<style> #<?=$rand?>:before { content: "\f0e4" }</style>
	<?

	foreach ($GLOBALS['cmp'] as $func => $name ) {
		if( (! is_component('useraccess')) or useraccess( admin_logged(), $func) ){
			do_admin_sidebar_this( $func, $name );
		}
	}

	?>
	</div>
	</div>
	<?
	
}


function do_admin_sidebar_this( $func, $name ){
	
	if(! $icon_code = $GLOBALS['cmp-icon'][ $func ] ){
		$icon_code = '1b2';
	}

	if( substr($func, 0, 7) == 'cat_mg&' ){
		$cat_name = substr($func, 9);
		if( cat_detail($cat_name)['dashboard'] ){
			if( cat_detail($cat_name)['dashboard'] !== true ){
				$icon_code = cat_detail($cat_name)['dashboard'];
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

	if( strstr( $func , '_mg&l=' ) ){
		$func_slug = explode( '_mg&l=', $func )[0];
		$func_slug.= '/'.explode( '_mg&l=', $func )[1];
	} else {
		$func_slug = substr($func,0,-3);
	}

	echo "\t\t".'<a'.( $func==$_REQUEST['cp'] ? ' class="current"' : '' ).' href="'._URL.'/admin/'.$func_slug.'"><icon id="'.$rand.'"></icon><span>'.$name.'</span></a>'."\n";
	echo "\t\t<style> #".$rand.":before { content: \"\\f".$icon_code."\" }</style>\n\n";

}






<?

# jalal7h@gmail.com
# 2017/02/13
# 3.2

	// listmaker_tabmenu([
	
	// 	"ticketbox_mg_list" => __("لیست %%",[ lmtc('ticketbox')[1] ]) ,
	// 	"ticketbox_mg_form" => __("%% جدید",[ lmtc('ticketbox')[0] ]) ,
	// 	"cat_mg&l=ticketbox" => cat_detail('ticketbox')['name'],

	// ], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

/*
// $url = "./?page=admin&cp=".$_REQUEST['cp'];
// $menu = array(
// 	"ms_management_list" => "لیست موبایل ها",
// 	"ms_management_form" => "ثبت موبایل جدید",
// 	"cat_mg&l=brand" => "برندها",
// 	"cat_mg&l=stuff_status" => "وضعیت ها",
// 	"cat_mg&l=mobile_sim" => "سیم ها",
// 	"cat_mg&l=mobile_os" => "سیستم عامل ها",
// 	"cat_mg&l=mobile_browser" => "مرورگر",
// );
// listmaker_tabmenu($menu,$url);

listi az title / function behesh midim
ye tabmenu doros mikone, ta in title ha, ke rush click mishe function e ro run mokone
/*README*/

function listmaker_tabmenu( $menu, $url, $func_k="func" ){
	
	/*************/
	if( $GLOBALS['listmaker_tabmenu-used-keys'] ){
		while( in_array( $func_k , $GLOBALS['listmaker_tabmenu-used-keys'] ) ){
			$func_k_i = intval(substr($func_k_i, 4));
			$func_k_i++;
			$func_k = "func".$func_k_i;
		}
	}
	$GLOBALS['listmaker_tabmenu-used-keys'][] = $func_k;
	/**********/

	if(! $_REQUEST['do'] ){
		$_REQUEST['do'] = 2;
	}
	
	if( $func_k != "func" ){
		if(! strstr($url, '&func=') ){
			$url.= "&func=".$_REQUEST['func'];
		}
	}

	?>
	<div class="listmaker_tabmenu_line" ></div>
	<div class="listmaker_tabmenu" dir="<?=_rtl?>" >
		<?
		foreach( $menu as $func => $title ){
			
			$func_list[] = $func;
			
			if(! $title ){
				continue;
			}

			if(! $_REQUEST[$func_k] ){
				$_REQUEST[$func_k] = $func;
			}

			#
			# what to do for func like : "ms_management_cat&cat=brand"
			$func_main_switch = substr($func,0,strlen($_REQUEST[$func_k]));
			
			if( $func != $func_main_switch ){
				$func_sub_switch = substr($func, strlen($func_main_switch)+1);
				$func_sub_switch = explode("&", $func_sub_switch);
				$func_sub_switch = $func_sub_switch[0];
				$func_sub_switch = explode("=", $func_sub_switch);
				$func_sub_switch_k = $func_sub_switch[0];
				$func_sub_switch_v = $func_sub_switch[1];
			
			} else {
				$func_sub_switch_k = "";
				$func_sub_switch_v = "";
			}

			echo (
				($_REQUEST[$func_k]==$func_main_switch and $_REQUEST[$func_sub_switch_k]==$func_sub_switch_v)
					?'<a class="listmaker_tabmenu_current" '
					:'<a class="listmaker_tabmenu_normal" '
			).' href="'.$url.'&'.$func_k.'='.$func.'">'.$title.'</a>';
		}
		?>
	</div>
	<div class="listmaker_tabmenu_down"></div>
	<?
	
	if($func = $_REQUEST[$func_k]){
		
		if( strstr($func, "&") ){
			$func = explode("&", $func);
			$func = $func[0];
		}
		
		if( function_exists($func) ){
			call_user_func($func);
		
		} else {
			echo "invalid function ".$func;
		}

	}

}







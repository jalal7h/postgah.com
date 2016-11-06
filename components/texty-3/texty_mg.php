<?

# jalal7h@gmail.com
# 2016/09/22
# 4.0

// $GLOBALS['cmp']['texty_mg'] = 'پیام های پیشفرض';
// $GLOBALS['cmp-icon']['texty_mg'] = '071';
$GLOBALS['setting']['texty_mg'] = 'پیام های پیشفرض';


function texty_mg(){

	#
	# action
	switch ($_REQUEST['do']){
		case 'form':
			return texty_mg_form();
	}

	echo "<div class='".__FUNCTION__."_head'>".$GLOBALS['cmp']['texty_mg']."</div><hr>";

	#
	# action
	switch ($_REQUEST['do']) {
		
		case 'flag':
			listmaker_flag('texty');
			break;

		case 'saveEdit':
			texty_mg_saveEdit();
			break;
	}

	texty_mg_list();

}



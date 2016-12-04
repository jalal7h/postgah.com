<?

# jalal7h@gmail.com
# 2016/09/14
# 2.1

$GLOBALS['block_layers_side']['userpanel_menu'] = 'منوی کاربری';

function userpanel_menu(){
	
	if(! $user_id = user_logged() ){
		return dg();
	
	} else if(! $rw = table("user",$user_id) ){
		dg();
		user_logout();
	
	} else if( $_REQUEST['page'] != 14 ){
		return dg();
	}

	echo "<style>\n";
	ksort($GLOBALS['userpanel_item']);
	foreach( $GLOBALS['userpanel_item'] as $n => $array ){
		$before_content = $array[2];
		echo '.userpanel_menu > div > a:nth-child('.( (++$a_ctr)+1 ).'):before {
			content: "\f'.$before_content.'";
		}';
	}
	echo "</style>\n";

	echo '<div class="userpanel_menu">';
	if( $rw['profile_pic']!='' ){
		echo '<a class="profile_avatar" href="./?page='.$_REQUEST['page'].'&do=userprofile_form"><img src="resize/320x500/'.$rw['profile_pic'].'" /></a>';
	} else {
		echo '<div class="profile_avatar"><img src="'._URL.'/image_list/avatar-not-found.png"/></div>';
	}

	echo '<div class="links">';
	
	userpanel_fix_do();

	echo '<a href="'._URL.'"><span>'.__('صفحه اصلی').'</span></a>';
	
	foreach( $GLOBALS['userpanel_item'] as $i => $array ){
		
		$func = $array[0];
		$name = $array[1];

		echo '<a href="'._URL.'/?page='.$_REQUEST['page'].'&do='.$func.'"'.( $_REQUEST['do']==$func ? " class=\"current\" " : "" ).'><span>'.$name.'</span></a>';

	}

	?>
	</div>
	</div>
	<?

}






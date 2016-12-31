<?

# jalal7h@gmail.com
# 2016/12/18
# 2.2

$GLOBALS['block_layers_side']['userpanel_menu'] = 'منوی کاربری';

function userpanel_menu(){
	
	$userpanel_slug = Slug::get('page',14);

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
		echo '<a class="profile_avatar" href="'._URL.'/'.$userpanel_slug.'/userprofile_form"><img src="'._URL.'/resize/320x500/'.$rw['profile_pic'].'" /></a>';
	} else {
		echo '<div class="profile_avatar"><img src="'._URL.'/image_list/avatar-not-found.png"/></div>';
	}

	echo '<div class="links">';
	
	userpanel_fix_do();

	echo '<a href="'._URL.'"><span>'.__('صفحه اصلی').'</span></a>';
	
	foreach( $GLOBALS['userpanel_item'] as $i => $array ){
		
		$func = $array[0];
		$name = $array[1];

		// '._URL.'/?page='.$_REQUEST['page'].'&do='.$func.'

		echo '<a href="'._URL.'/'.$userpanel_slug.'/'.$func.'" class="userpanel_menu_'.$func.( $_REQUEST['do']==$func ? " current" : "" ).'" ><span>'.$name.'</span></a>';

	}

	?>
	</div>
	</div>
	<?

}






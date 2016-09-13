<?

function pgShop_user_form(){

	if(! $user_id = user_logged() ){
		die();
	}

	if(! $_REQUEST['id'] ){
		if(! $rs = dbq(" SELECT * FROM `shop` WHERE `user_id`='$user_id' LIMIT 1 ") ){
			e(__FUNCTION__,__LINE__);

		} else if( dbn($rs) ){
			echo "<div class='convbox'>درحال حاضر امکان ثبت بیش از یک فروشگاه برای هر کاربر نیست!</div>";
			return true;
		}
	}

	$content = listmaker_form('
		[!
			"table" => "shop" ,
			"action" => "./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do1",
		!]
			
			[!"text:path*","inDiv"!]
			[!"text:name*","inDiv"!]
			[!"textarea:desc","inDiv"!]
			[!"file:logo","inDiv"!]
			
			<hr>

			[!"text:address","inDiv"!]
			[!"number:phone","inDiv"!]
			[!"toggle:flag","inDiv"!]
			
			<hr>

			[!"submit:ثبت","inDiv"!]

		[!close!]
	');

	layout_post_box( "مشخصات فروشگاه", $content, $allow_eval=false, $framed=1 );

}


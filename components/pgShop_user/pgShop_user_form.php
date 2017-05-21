<?php

# jalal7h@gmail.com
# 2017/05/21
# 1.1

function pgShop_user_form(){

	if(! $user_id = user_logged() ){
		die();
	}

	# 
	# only one shop for each user
	if(! $_REQUEST['id'] ){
		if(! $rs = dbq(" SELECT * FROM `shop` WHERE `user_id`='$user_id' LIMIT 1 ") ){
			e();

		} else if( dbn($rs) ){
			echo convbox('درحال حاضر امکان ثبت بیش از یک فروشگاه برای هر کاربر نیست!','transparent');
			return true;
		}
	}

	$content = listmaker_form('
		[!
			"table" => "shop" ,
			"action" => "./?page='.$_REQUEST['page'].'&do_slug='.$_REQUEST['do_slug'].'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
		!]
			
			[!"text:path*"=>"'._DOMAIN.'/".$rw["path"], "validation"=>"pgShop_user_form_pathCheck"!]
			[!"text:name*", "content_max"=>"60c"!]
			[!"textarea:desc", "content_max"=>"500c"!]
			[!"file:logo"!]
			
			<hr>

			[!"text:address"!]
			[!"number:phone+"!]
			[!"toggle:flag"!]
			
			<hr>

		[!submit!]

	');

	layout_post_box( "مشخصات فروشگاه", $content, $allow_eval=false, $framed=1 );

}


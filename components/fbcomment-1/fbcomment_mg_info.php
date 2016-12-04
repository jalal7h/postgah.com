<?

# jalal7h@gmail.com
# 2016/11/29
# 1.0

function fbcomment_mg_info( $rw ){

	$profile_name = table("user", $rw['user_id'], "name");
	$profile_link = userprofile_link( $rw['user_id'] );

	$item_name = table($rw['table_name'],$rw['table_id'],'name');
	$item_link = _URL."/?page=".$rw['page_id']."&id=".$rw['table_id']."&#comment-".$rw['id']; // nxx

	$info = "<a target=_blank href='$profile_link' class='name'>$profile_name</a> ".__('درباره')." <a target=_blank href='$item_link'>$item_name</a> : ";
	$info.= $rw['text'];

	return $info;

}




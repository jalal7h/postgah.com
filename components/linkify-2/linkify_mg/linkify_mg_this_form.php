<?

# jalal7h@gmail.com
# 2017/01/06
# 2.1

function linkify_mg_this_form(){

	if(! $id = $_REQUEST['id'] ){
		// new

	} else if(! $rw = table("linkify", $id) ){
		dg();
	}

	$parent = intval($_REQUEST['parent']);

	if(! $cat = intval($_REQUEST['cat']) ){
		dg();

	} else if(! $rw_linkify_config = table('linkify_config', $cat) ){
		dg();

	} else if(! $rs_page = dbq(" SELECT * FROM `page` WHERE 1 ORDER BY `id` ASC ") ){
		dg();

	} else while( $rw_page = dbf($rs_page) ){
		$list_of_pages_in_select.= "<option value='".layout_link($rw_page)."::".$rw_page['name']."' >".$rw_page['name']."</option>";
	}
	
	if( is_component('postadmin') ){
		$list_of_posts_in_select = postadmin_list_of_posts_in_select();
	}
	

	## -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "linkify" ,
			"action" => _URL."/?page=admin&cp=".$_REQUEST["cp"]."&do=".$_REQUEST["do"]."&cat='.$cat.'&parent='.$parent.'",
			"switch" => "do1",
		!]
			
			[!"select:list_of_pages_in_select","Pages","option"=>"'.$list_of_pages_in_select.'"!]
			'.( is_component('postadmin') ? 
				'[!"select:list_of_posts_in_select","Posts","option"=>"'.$list_of_posts_in_select.'"!]' : '' ).'

			<hr>

			[!"text:name*"!]
			[!"text:url*"=>linkify_URL_remove($rw["url"])!]
			
			<hr>
			
			'.( $rw_linkify_config['haveIcon'] ? '[!"file:pic"!]<hr>' : '' ).'
			
		[!"submit:'.__("ثبت").'"!]
	');
	## -------------------------------------------------


}







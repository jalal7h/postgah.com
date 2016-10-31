<?

# jalal7h@gmail.com
# 2016/10/28
# 2.0

function linkify_mg_this_form(){

	if(! $id = $_REQUEST['id'] ){
		;// new

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
		$list_of_pages_in_select.= "<option value='".layout_page_link($rw_page)."::".$rw_page['name']."' >".$rw_page['name']."</option>";
	}
	

	## -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "linkify" ,
			"action" => _URL."/?page=admin&cp=".$_REQUEST["cp"]."&do=".$_REQUEST["do"]."&cat='.$cat.'&parent='.$parent.'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do1",
		!]
			
			[!"select:list_of_pages_in_select","option"=>"'.$list_of_pages_in_select.'","inDiv"!]

			<hr>

			[!"text:name*","inDiv"!]
			[!"text:url*","inDiv"!]
			
			<hr>
			
			'.( $rw_linkify_config['haveIcon'] ? '[!"file:pic","inDiv"!]<hr>' : '' ).'
			
			[!"submit:ثبت","inDiv"!]

		[!close!]
	');
	## -------------------------------------------------


}







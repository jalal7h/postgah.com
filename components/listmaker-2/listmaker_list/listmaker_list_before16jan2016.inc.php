<?

# jalal7h@gmail.com
# 2017/05/19
# 1.42

/*
	
	###################################################################################
	# the list
	#
	
	$table = 'item'; // ??
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `$table` WHERE 1 AND `parent`='$parent' ORDER BY `prio` ASC ";
	$list['tdd'] = 10; // tedad dar safhe
	
	#
	# base url is needed in version upper 1.2 
	# ** address base e in list
	$list['base_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"].($parent?'&parent='.$parent:'');

	#
	# target // maghsad e click ruye har row
	$list['target_url'] = '"./?page=admin&cp='.$_REQUEST['cp']."&l=".$_REQUEST["l"].'&parent=".$rw["id"]';

	#
	# actions 
	# ** mitunim link ham bedim bejaye 'true'
	# ** ama age base_url ro dashte bashim az hamun estefade mikone
	#
	$list['modify_url'] = true; // link icon modify 
	or $list['modify_url_inBlank'] = true; // this will open in new tab

	$list['addnew_url'] = false; // [true/false/url] default is false
	$list['remove_url'] = true; // link dokme hazf
	$list['up_or_down'] = true; // link priority
	$list['setflag_url'] = true; // link active / inactive
	$list['paging_url'] = true; // not needed when we have 'tdd'
	
	#
	$list['addnew_prompt'] = __('ارسال پیام پشتیبانی جدید');

	#
	# list array // list e sotun haye list
	$list['list_array'][] = array( "head"=>lmtc($table.":pic") , "tag"=>"th", "picture" => '$rw[\'pic\']');
	$list['list_array'][] = array("head"=>lmtc($table.":name"), "content" => '$rw[\'name\']');
	$list['list_array'][] = array("head"=>lmtc($table.":url"), "content" => '$rw[\'url\']');
	$list['list_array'][] = [ "head"=>lmtc($table.":name"), "title"=>'$rw["slug"]', "content"=>'$rw[\'name\']' ];
	
	$list['height'] = 100;

	#
	# search columns // az in field ha tu table search mikone
	$list['search'] = [ "name", "text", "user(user_id)[email]", "user(user_id)[name]" ]; jai ke name moshabehe q hast, id sho az user miare beyne user_id haye table ma peyda mikone

	#
	# paging select
	$list['paging_select'] = array(
		'cityId' => "<option value=''>استان » شهر</option>".city_options($array=false),
		'maghta' => "<option value=''>مقطع تحصیلی</option>".cat_display('maghta',$is_array=false,$parent=0,$optionPreStr=""),
		'group' => "<option value=''>گروه شغلی</option>".cat_display('group',$is_array=false,$parent=0,$optionPreStr=""),
		'jensiat' => "<option value=''>جنسیت</option>".cat_display('jensiat',$is_array=false,$parent=0,$optionPreStr=""),
		
	);
	
	$list['linkTo']['some_name_for_a_tag'] = [
		'url'	=> '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=tour_management_list&p=".$_REQUEST["p"]."&do=setHotel&id=".$rw["id"]',
		'icon'	=> '021',
		'name'	=> 'بروزرسانی',
		'color'	=> '#f00',
		'width'	=> 65,
		'yechi'	=> 'yechi dge'.
	];

	#
	# echo result
	echo listmaker_list( $list );
	#
	########################################################################################

in , joziat ro migire, ye list mide

esm e list, class e list (tu css be kar miad)
	$list['name'] = 'name-of-list-as-classname';
	
query
$list['query'] = " SELECT * FROM `hotel` WHERE 1 ORDER BY `name` ASC ";
	
tedad dar safhe
$list['tdd'] = 12;


// link e click ru record
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';

// link e virayesh (albate man mamulan edit ro ru target_url link midam va ino disable mikonam)
	$list['modify_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form&id=".$rw["id"]';
	
// button e sabt e jadid => redirect be form e sabt
	$list['addnew_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_form';
	

// link e page 2 , 3 , ... (addadd e page ro khodesh ezafe mikone)
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	
// esme variable e shomarande page, masalan p0=2 , p0=3, esme variable ro dadim "p0"
// albate in mored pishfarz "p" hast
	$list['page_number_field'] = "p0";

// link e hazf
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=remove&id=".$rw["id"]';
	
// peygham e hazf
	$list['remove_prompt'] = '"آیا مایل به حذف مورد به نام ".$rw["name"]." هستید?"';
	
// dokme haye enteghal be bala va pain
	$list['up_n_down'] = array(
		'up'=>'"./?page=admin&cp='.$_REQUEST['cp'].'&do=moveUp&id=".$rw["id"]',
		'down'=>'"./?page=admin&cp='.$_REQUEST['cp'].'&do=moveDown&id=".$rw["id"]'
	);

// link e tanzim e flag , ke gharare be listmaker_flag berese
	$list['setflag_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&do=active&id=".$rw["id"]';
	
// sotun e tain konande ye rang e record. (faal ya gheyre faal)
	$list['tr_color_identifier'] = '$rw["flag"]';

// list e sotun ha
	$list['list_array'] = array (
		array("head"=>"عکس", "tag"=>"th", "picture" => '$rw[\'pic\']'),
		array("content" => '$rw[\'visit\']." بازدید"' ,"attr" => array("align" => 'center',"dir" => "rtl")),
	);

// in baes mishe , age 2ta az in function call konim, unai ke tu run e aval list shod, tu run e dovom list nashe
	$list['exclude_in_query'] = true;

// link haye ezafe ke baste be karbord ezafe mikonim o kenare dokme edit / remove / flag/ .. miad
	$list['linkTo'][] = array(
		'url' => '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=tour_management_list&p=".$_REQUEST["p"]."&do=setHotel&id=".$rw["id"]',
		'name' => 'هتلها',
		'width' => 35,
	);
	

// filter haye zire list
	$list['paging_select'] = array(
		'cityId' => "<option value=''>استان » شهر</option>".city_options($array=false),
		'maghta' => "<option value=''>مقطع تحصیلی</option>".cat_display('maghta',$is_array=false,$parent=0,$optionPreStr=""),
		'group' => "<option value=''>گروه شغلی</option>".cat_display('group',$is_array=false,$parent=0,$optionPreStr=""),
		'jensiat' => "<option value=''>جنسیت</option>".cat_display('jensiat',$is_array=false,$parent=0,$optionPreStr=""),
		
	);

// lit e sotun hai ke bauat tush search beshe ro inja miarim
// va balaye list ye form e search miare
	$list['search'] = array("name");
	
	$list['tr_class'] = 'someclassfunc($rw)',

//echo mikone ...
	echo listmaker_list($list);

/*README*/


function listmaker_list_before16jan2016( $list ){

	# fix sort
	if( $list['sort'] ){
		$list['sort'] = ( strstr($list['sort'],'/') ? str_enc($list['sort']) : $list['sort'] );
	}

	$c.= "<div ".$list['etc']." class=\"".__FUNCTION__."_c".( $list['name'] ? ' '.$list['name'].'_c' : '' )."\">\n";

	#
	# height
	if(!$list['height']){
		$list['height'] = 50;
	}

	#
	# replacing up_n_down with up_or_down in version 1.16
	if(! $list['up_or_down'] ){
		$list['up_or_down'] = $list['up_n_down'];
	}

	#
	# the `id` column name
	if( $list['id_column'] ){
		$id_column = $list['id_column'];
	} else {
		$id_column = 'id';
	}

	###################################################################################
	# minifing the parameters in listmaker_list
	#
	# fix n bake the base_url
	if( $base_url = trim($list['base_url']) ){
		
		eval("\$base_url = $base_url;");
	
		#
		$base_url_tmp = str_replace( '?', '&', $base_url );
		do {
			$nwDoFld = "do".$do_c;
			$do_c++;
		} while( strstr( $base_url_tmp , '&'.$nwDoFld.'=' ) );
		#
		#
		# up or down
		if( $list['up_or_down']===true and is_bool($list['up_or_down']) ){
			$list['up_or_down'] = array(
				'up'	=> '"'.$base_url.'&'.$nwDoFld.'=prio&up_or_down=up&id=".$rw["'.$id_column.'"]' ,
				'down'	=> '"'.$base_url.'&'.$nwDoFld.'=prio&up_or_down=down&id=".$rw["'.$id_column.'"]'
			);
		}
	}
	
	#
	# remove url
	if( $list['remove_url']===true and is_bool($list['remove_url']) ){
		// its new version if lml and its true , so it have the base_url
		$list['remove_url'] = '"'.query_string_set( [$nwDoFld,$id_column], null, $base_url ).'&'.$nwDoFld.'=remove&id=".$rw["'.$id_column.'"]';
	}
	#
	# modify url
	if( $list['modify_url_inBlank'] ){
		$list['modify_url'] = $list['modify_url_inBlank'];
		$modify_url_inBlank = true;
	}
	if( $list['modify_url']===true and is_bool($list['modify_url']) ){
		$list['modify_url'] = '"'.$base_url.'&'.$nwDoFld.'=form&id=".$rw["'.$id_column.'"]';
	} else if( $list['target_url']===true and is_bool($list['target_url']) ){
		$list['target_url'] = '"'.$base_url.'&'.$nwDoFld.'=form&id=".$rw["'.$id_column.'"]';
	}
	#
	# paging url
	if( ( (!$list['paging_url']) and $list['tdd'] ) 
	or( is_bool($list['paging_url']) and $list['paging_url']===true ) ){
		$list['paging_url'] = '"'.$base_url.'&p=%%"';
	}
	#
	# setflag url
	if( $list['setflag_url']===true and is_bool($list['setflag_url']) ){
		$list['setflag_url'] = '"'.$base_url.'&'.$nwDoFld.'=flag&id=".$rw["'.$id_column.'"]';
		if(! $list['tr_color_identifier'] ){
			$list['tr_color_identifier'] = '$rw["flag"]';
		}
	}
	#
	# addnew url
	$addnew_url = $list['addnew_url'];
	#
	if( is_bool($addnew_url) ){
		if( $addnew_url===true ){
			$addnew_url =  $base_url;
			if( strstr( $base_url, '?' ) ){
				$addnew_url.= '&'.$nwDoFld.'=form';
			} else {
				$addnew_url.= '/new';				
			}
		} else {
			$addnew_url = false;			
		}
		
	} else if( is_string($addnew_url) ){
		eval("\$addnew_url = $addnew_url;");

	} else {
		$addnew_url = false;
	}
	#
	################################################################################### 


	#
	# the tag
	// $tag = ($list['tag']=='th'?'th':'td');

	#
	# paging
	if( $paging_url = trim($list['paging_url']) ){

		if(! $list['tdd'] ){
			$list['tdd'] = 10;
		}

		#
		# bake the paging url
		eval("\$paging_url = $paging_url;");

		#
		# page number field and value of the `P`
		if($list['page_number_field']!=''){
			$page_number_field = $list['page_number_field'];
		} else {
			$page_number_field = $paging_url;
			if(strstr($page_number_field, "=%%")){
				$page_number_field = explode("=%%", $page_number_field);
				$page_number_field = $page_number_field[0];
				$page_number_field = strrev($page_number_field);
				$page_number_field = explode("&", $page_number_field);
				$page_number_field = $page_number_field[0];
				$page_number_field = strrev($page_number_field);
			} else if(substr(strrev($page_number_field), 0, 1)=="="){
				$page_number_field = strrev($page_number_field);
				$page_number_field = explode("&", $page_number_field);
				$page_number_field = $page_number_field[0];
				$page_number_field = strrev($page_number_field);
				$page_number_field = explode("=", $page_number_field);
				$page_number_field = $page_number_field[0];
			} else {
				$page_number_field = "p";
			}
		}
		$p = intval($_REQUEST[$page_number_field]);
	}

	# 
	# fix initial query
	# when there is no WHERE and ORDER, but its needed
	if(!stristr($list['query'], " WHERE ")){
		if(stristr($list['query'], " ORDER ")){
			$list['query'] = explode(" ORDER ", $list['query']);
			$list['query'][0].= " WHERE 1 ";
			$list['query'] = implode(" ORDER ", $list['query']);
		} else {
			$list['query'].= " WHERE 1 ";
		}
	}
	// if(!stristr($list['query'], " ORDER ")){
	// 	$list['query'].= " ORDER BY `id` DESC ";
	// }
	
	#
	# exclude in query
	if($list['exclude_in_query'] and sizeof($GLOBALS['exclude_in_query'])){
		$list['query'] = explode(' WHERE ', $list['query']);
		$list['query'][1] = " `id` NOT IN (".implode(",", $GLOBALS['exclude_in_query']).") AND ".$list['query'][1];
		$list['query'] = implode(" WHERE ", $list['query']);
	}

	# 
	# make the limit stt tdd
	// $tdd = ( $list['tdd'] > 0 ? $list['tdd'] : 10 );
	if( $tdd = intval($list['tdd']) ){
		$stt = $tdd * $p;
		$list['query'].= " LIMIT $stt,$tdd ";
		$remove_prompt = __("آیا مایل به حذف هستید؟");	
	}
	
	
	#
	# add search parameter in QUERY, and also in URL
	if($list['search']){
		if($q = $_REQUEST['q']){
			$add_to_end_of_url.= "&q=".$q;
			$search_query.= " ( ";
			foreach ($list['search'] as $k => $field) {		
				
				if( strstr($field, '[') ){
					$table_Name = explode('(', $field)[0]; // user
					$name_Field = substr( explode(')[',$field)[1] , 0 , -1 ); // email or name
					$id_Field = explode( ')' , explode('(',$field)[1] )[0]; // user_id
					if( strstr($id_Field, '=') ){
						$id_Field = explode('=', $id_Field);
						$id_Field_left = $id_Field[0];
						$id_Field_right = $id_Field[1];
					} else {
						$id_Field_left = $id_Field;
						$id_Field_right = 'id';
					}
					$search_query.= " `$id_Field_left` IN ( SELECT `$id_Field_right` FROM `$table_Name` WHERE `$name_Field` LIKE '%$q%' ) ";

				} else {
					$search_query.= " `".$field."` LIKE '%".$q."%' ";
				}
				
				$search_query.= " OR ";
			}
			$search_query.= " 0 ) AND ";
		}
		if($search_query!=''){
			$list['query'] = str_ireplace(" WHERE "," WHERE ".$search_query." ", $list['query']); // *
		}
	}

	#
	#  the select-boxes.
	if($list['paging_select']){
		#
		# processing paging-select parameters
		foreach($list['paging_select'] as $paging_select_name => $paging_select_value){
			#
			# add the paging select to URL
			$add_to_end_of_url.= "&".$paging_select_name."=".$_REQUEST[$paging_select_name];
			#
			# collect the paging select parameters for query
			if( isset($_GET[$paging_select_name]) and $_GET[$paging_select_name]!=='' ){
				$paging_select_query.=" `$paging_select_name`='".$_GET[$paging_select_name]."' AND ";
			}
		}
		#
		# use paging select query parameters in QUERY
		$list['query'] = str_ireplace(" WHERE "," WHERE ".$paging_select_query." ", $list['query']); // *

		# 
		# adding the select-box params to end of paging-url
		# remembering the filters to page-links
		$paging_url = listmaker_list__add_to_begin_of_url( $paging_url , $add_to_end_of_url );
		
		#
		# html content of paging-select tags
		# this will displaied in footer of list
		foreach($list['paging_select'] as $paging_select_name => $paging_select_value){
			$rand = rand(10000,99999);
			$select_url = $paging_url;
			$select_url = str_replace('&'.$paging_select_name.'=','&nt=',$select_url);
			$select_url = str_replace('&'.$page_number_field.'=','&nt=',$select_url);
			$paging_select_c.= "
			<div id='paging_select".$rand."' class='paging_select'>
			<select onchange=\"location.href='".$select_url."&".$paging_select_name."='+this.value;\" >
				".(strstr($paging_select_value," value=''")?"":"<option value=''></option>")."
				$paging_select_value
			</select>
			</div>
			<script>$('#paging_select".$rand." select').val('".$_GET[$paging_select_name]."')</script>\n";
		}
	}

	# 
	# fetch table name from `query`
	$table_item_name = query_table_name( $list['query'] );
	if( $lmtc = lmtc($table_item_name) ){
		$table_item_name = $lmtc[0];
	} else {
		$table_item_name = __('مورد');
	}

	#
	# the hidden input
	$c.= "<iframe name=\"_hidden\"></iframe>";

	#
	# head 
	if( $list['head'] ){
		$c.= "<div class=\"listmaker_head\">".$list['head']."</div>";
	}

	$c.= "<!-- ADD_NEW_URL_PLACE --!>";

	#
	# textbox for search if needed
	if( $list['search'] ){
		$c.= "
		<form class='listmaker_list_search ".( $addnew_url ? 'have_addnew_url' : '' )."' action='".$paging_url."' method='post'>\n
		<input autocomplete='off' placeholder='".__("جستجو ...")."' type='text' name='q' value='".$_REQUEST['q']."'>\n
		</form>\n";

	}

	// $c.= "<div style=clear:both >..</div>";

	if(! $list['addnew_prompt'] ){
		$list['addnew_prompt'] = __("%% جدید", [ $table_item_name ]);
	}

	#
	# try to query mysql
	if(! $rs = dbq($list['query']) ){
		e( dbe() );
	
	} else if(! dbn($rs) ){

		$c.= "
		<div class='listmaker_list-no-record-found'>\n
			".__("%% یافت نشد.",[$table_item_name])."
			".($addnew_url ?"<br><a class='btn btn-primary' href='".$addnew_url."' >".$list['addnew_prompt']."</a>\n" :"")."
		</div>\n";
		$c.= $paging_select_c;
	
	} else {

		$c.= "<form class='listmaker_list_form' id='listmaker_list_".$list['name']."_form' method='post' action='' >\n";
		$c.= '<table class="listmaker_list boxborder'.($list['name']?" ".$list['name']:"").'" cellpadding="10" cellspacing="5" >'."\n";
		$c.= '<tbody '.( $list['sort'] ? 'class="sortable" feed="'.$list['sort'].'"' : '' ).' >';

		if( $addnew_url ){
			$c = str_replace( '<!-- ADD_NEW_URL_PLACE --!>', "<a class='lmfe_newButton btn btn-primary' href='".$addnew_url."' >".$list['addnew_prompt']."</a>\n", $c );
		}

		#
		# head
		foreach($list['list_array'] as $k => $th){
			if($th['head']){
				$display_head = true;
			}
		}
		if($display_head){
			$c.= "<tr class='listmaker_list_head' >\n";
			$clspan = 0;
			foreach($list['list_array'] as $k => $th){
				$c.= "<th>".$th['head']."</th>\n";
				$clspan++;
			}
			if( sizeof($list['linkTo']) or $list['remove_url'] or $list['setflag_url'] or $list['modify_url'] or $list['up_or_down']){
				$c.= "<th></th>\n";
				$clspan++;
			}

			$c.= "</tr>\n";
			$c.= "<tr class=listmaker_list_head_footer ><td colspan=$clspan ></td></tr>\n";
		}
		
		#
		# TR
		while($rw = dbf($rs)){
			
			#
			# put into exclude-queue
			if($list['exclude_in_query']){
				$GLOBALS['exclude_in_query'][] = $rw[ $id_column ];
			}
			
			#
			# TR bgcolor
			if( $list['tr_color_identifier'] ){
				$tr_color_identifier = $list['tr_color_identifier'];
				eval("\$tr_color_identifier = $tr_color_identifier;");
			} else {
				$tr_color_identifier = 1;
			}

			#
			# bake the target url
			if($target_url = trim($list['target_url'])){
				eval("\$target_url = $target_url;");
			}
			if( $add_to_end_of_url ){
				if(strstr($target_url, "?")){
					if(!strstr($target_url, "&".$page_number_field."=")){
						$target_url.= "&".$page_number_field."=".$p;
					}
					$target_url.= $add_to_end_of_url;
				} else {
					$target_url.= "?".substr($add_to_end_of_url,1);
				}
			}
			
			#
			# bake the remove url
			if($remove_url = trim($list['remove_url'])){
				eval("\$remove_url = $remove_url;");
			}
			if(!strstr($remove_url, "&".$page_number_field."=")){
				$remove_url.= "&".$page_number_field."=".$p;
			}
			$remove_url.= $add_to_end_of_url;
			
			#
			# bake the modify url
			if($modify_url = trim($list['modify_url'])){
				eval("\$modify_url = $modify_url;");
			}
			if(!strstr($modify_url, "&".$page_number_field."=")){
				$modify_url.= "&".$page_number_field."=".$p;
			}
			$modify_url.= $add_to_end_of_url;
			
			#
			# bake the setflag url
			if($setflag_url = trim($list['setflag_url'])){
				eval("\$setflag_url = $setflag_url;");
			}
			if(!strstr($setflag_url, "&".$page_number_field."=")){
				$setflag_url.= "&".$page_number_field."=".$p;
			}
			$setflag_url.= $add_to_end_of_url;
			

			#
			# tr_class
			if( $tr_class = $list['tr_class'] ){
				eval("\$tr_class = $tr_class;");
			}

			#
			# tr cursor : pointer or default
			if( $list['target_url'] ){
				$tr_class.= " pointer";
			}

			#
			# opening new TR
			$c.= "<tr the_id=\"".$rw['id']."\" class='listmaker_list_record $tr_class ".( $tr_color_identifier==0 ?"listmaker_list_record_inactive":"").
				"' onc".($list['target_url']?"":"0")."lick='".($list['target_blank']?"location.target=\"_blank\";":"")."if(lml_intoolstd!=\"in\")location.href=\"$target_url\";' >\n";

			$clspan0++;
			# TD Open
			foreach($list['list_array'] as $k => $td){
				
				#
				# picture cell
				if($td['picture']){
					$picture = trim($td['picture']);
					eval("\$picture = ".$picture.";");
					if( $picture ){
						if( substr($picture,0,4) != 'http' ){
							$picture = _URL."/".$picture;
						}
					}
					$attr_str = "class='listmaker_list_picture' width='".$list['height']."px' ";
				} else {
					$attr_str = "";
				}
				
				#
				# bake all values in td attr
				if(sizeof($td['attr']) > 0){
					foreach($td['attr'] as $attr => $value){
						if(!trim($value)){
							continue;
						} else {
							#
							# bake the attr value
							if(strstr(str_replace(array('$',')'),'$',$value),"$")){
								eval("\$value = ".$value.";");
							}
							$attr_str.= " ".$attr."='$value'";
						}
					}
				}

				#
				# tag
				$tag = ( $td['tag'] ? $td['tag'] : 'td' );

				#
				# tag display
				if( $td['title'] ){
					eval("\$title = ".$td['title'].";");
				}
				$c.= "<$tag $attr_str".( $title ? " title=\"$title\"" : '' )." >\n";
				$title = "";
				
				$td['content'] = trim($td['content']);
				
				if($td['content']){
					eval("\$content = ".$td['content'].";");
					$c.= $content;
				
				} else if( $picture ){
					$c.= "<img class='isss' src='$picture' style='height: ".$list['height']."px; width:".round($list['height']*(1.4))."px' />\n";
				}
				
				$c.= "</$tag>\n";
				$clspan0++;
			}
			# TD Close

			#
			# tools TD width
			$url_td_width = 0;
			if($list['remove_url']){
				$url_td_width+= 33;
			}
			if($list['setflag_url']){
				$url_td_width+= 33;
			}
			if($list['modify_url']){
				$url_td_width+= 33;
			}
			if($list['up_or_down']){
				$url_td_width+= 66;
			}
			if(sizeof($list['linkTo'])){
				foreach($list['linkTo'] as $linkTo){
					if($linkTo['width']){
						$url_td_width+= $linkTo['width'];
					} else {
						$url_td_width+= 37;
					}
				}
			}

			$url_td_width+= 20;

			#
			# tools TD display
			if($list['remove_url'] or $list['setflag_url'] or $list['modify_url'] or sizeof($list['linkTo'])){
				$c.= "<td width='".$url_td_width."px' class='tools-td' >\n";
				
				#
				# remove url html code
				if($list['remove_url']){
					if($list['remove_prompt']){
						$remove_prompt = $list['remove_prompt'];
						eval("\$remove_prompt = $remove_prompt;");
					}
					$c.= "<a class='remove' href='$remove_url' title='".__("حذف")."' onclick='if(!confirm(\"".$remove_prompt."\"))return false;' ></a>\n";
				}

				#
				# setflag url html code
				if($list['setflag_url']){
					$c.= "<a class=\"setflag".( $tr_color_identifier ? "" : " off" )."\" href=\"$setflag_url\" title=\"".( $rw['flag'] ? __("فعال") : __("غیرفعال") )."\" ></a>\n";
				}

				#
				# modify url html code
				if($list['modify_url']){
					$c.= "<a class='modify'". ( $modify_url_inBlank ? " target=\"_blank\"" : "" ) ." href='$modify_url' title='".__("ویرایش")."' ></a>\n";
				}

				#
				# linkTo url html code
				if(sizeof($list['linkTo'])){
					foreach( $list['linkTo'] as $link_to_name => $linkTo ){

						#
						# etc elements in linkTo
						$elem_etc = [];
						foreach( $linkTo as $elem_name => $elem_value ){
							if(! in_array( $elem_name, ['url','icon','name','color','width','func','confirm'] ) ){
								$elem_etc[] = $elem_name.'="'.$elem_value.'"';
							}
						}
						if( sizeof($elem_etc) ){
							$elem_etc = " ".implode(' ', $elem_etc);
						}

						#
						# name of link
						if( is_numeric($link_to_name) ){
							$link_to_name = "link_to_".($linkTo['icon'] ?$linkTo['icon']."_" :'').md5x($linkTo['name'],6);
						}

						# 
						# func
						$linkTo_flag = true;
						if( $linkTo_func = $linkTo['func'] and function_exists($linkTo_func) ){
							if(! $linkTo_func( $rw ) ){
								$linkTo_flag = false;
							}
						}

						# 
						# url
						if( $linkTo_flag ){
							if( function_exists( $linkTo['url'] )){
								$linkTo_url = call_user_func( $linkTo['url'], $rw );
							} else {
								eval("\$linkTo_url = ".$linkTo['url'].";");
							}
						}

						#
						# confirm
						if( $linkTo_flag ){
							if( $confirm = $linkTo['confirm'] ){
								if( is_bool($confirm) ){
									$confirm = __('Are you sure?');
								}
								$confirm = " onclick='if(! confirm(\"".$confirm."\") ) return false;' ";
							}
						}

						#
						# icon
						if( $linkTo['icon'] ){
							$rand0 = rand(1000000,9999999);
							$c.= "<a $confirm name='$link_to_name' ".($linkTo['target'] ? "target='".$linkTo['target']."'" : '')." class='linkToFA ".(!$linkTo_flag?'disabled':'')."' id='linkToUrl".$rand0."' ".(!$linkTo_flag?'':"href='$linkTo_url'")." title='".$linkTo['name']."'".$elem_etc." ></a>
							<style>#linkToUrl".$rand0.":before {content:\"\\f".$linkTo['icon']."\";".($linkTo['color']?"background-color:".$linkTo['color'].";":"")."}</style>";							
						} else {
							$c.= "<a name='$link_to_name' ".($linkTo['target'] ? "target='".$linkTo['target']."'" : '')." class='linkTo btn btn-primary btn-sm' href='$linkTo_url' title='".$linkTo['name']."'".$elem_etc." >".$linkTo['name']."</a>";
						}

					}
				}

				# up and down links
				if( $list['up_or_down'] ){
					
					#
					# up link
					$up_or_down_up = $list['up_or_down']['up'];
					eval("\$up_or_down_up = $up_or_down_up;");
					#
					if(!strstr($up_or_down_up, "&".$page_number_field."=")){
						$up_or_down_up.= "&".$page_number_field."=".$p;
					}
					$up_or_down_up.= $add_to_end_of_url;

					#
					# down link
					$up_or_down_down = $list['up_or_down']['down'];
					eval("\$up_or_down_down = $up_or_down_down;");
					#
					if(!strstr($up_or_down_down, "&".$page_number_field."=")){
						$up_or_down_down.= "&".$page_number_field."=".$p;
					}
					$up_or_down_down.= $add_to_end_of_url;

					#
					# print it
					$c.= "	<a href='$up_or_down_up' class='up'></a>
							<a href='$up_or_down_down' class='down'></a>\n";
				}

				$c.= "</td>\n";
				$clspan0++;
			}

			#
			# closing this TR
			$c.= "</tr>\n";
		}

		#
		# closing the list
		$c.= "</tbody>\n";
		$c.= "</table>\n";
		$c.= "</form>\n";
		
		#
		# attaching the select-boxes
		$c.= $paging_select_c;
		
		#
		# paging
		if( $paging_url ){
			// e('__link: '.$paging_url);
			$c.= "<div style='clear:both;'></div>";
			$c.= listmaker_paging( $list['query'], $paging_url, $tdd );
		}

	}

	$c.= "<div style='clear:both;'></div>\n";
	
	$c.= "</div>\n";

	return $c;

}






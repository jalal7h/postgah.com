<?

# jalal7h@gmail.com
# 2016/05/07
# Version 1.2

/*

	echo lmfo([
		'table' => 'item' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['func'],
		// 'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'method' => 'post' ,
		'switch' => 'do',
	]);

	echo lmfe([
		'some text',
		['cat:cat_id', 'cat_name'=>'adsCat','inDiv'],
		['text:name*+','inDiv'],
		['color:color_code','inDiv'],
		['checkbox:flag','inDiv'],
		['toggle:flag','inDiv'],
		['date:date0','inDiv'],
		['textarea:brief[]','inDiv'],
		['textarea:desc.tinymce class_name'=>'متن آزماشی فورس شده','inDiv'],
		['name:name','عنوان اجباری','inDiv'],
		
		['number:prio','inDiv'],
		
		['radio:filter_lang','option'=>cat_display('filter_lang'),'inDiv'],
		
		['آدرس سایت', 'url:website','inDiv'],
		'<hr>',
		['آدرس ایمیل','email:email*+','inDiv'],
		['select:cat_id*+.some_class another_class#some_id.and_more_class','option'=>cat_display("cat"),'inDiv'],
		['file:stash_icon.someClass and_moreclass/rel="amita"','accept'=>'image/*','inDiv'],
		['submit:ثبت.some_class more class#some_id.className','inDiv'],
	]);

	echo lmfc();


	echo $GLOBALS['listmaker_form-formTable'];
	echo $GLOBALS['listmaker_form-formName'];
	var_dump( $GLOBALS['listmaker_form-rw'] );

- - - - - - - - - - - -

type hai ke darim : 
  
  [ 'text','color','name','number','textarea','select','checkbox','radio','date','clock','toggle','url','email','file','submit','hidden','password','cat','position' ]

function litesponsor_mg_form(){

	?><div id="litesponsor_mg_form"><?

	echo lmfo([
		'table' => 'litesponsor' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func=litesponsor_mg_list',
		'name' => 'sForm' ,
		'method' => 'post' ,
		'switch' => 'do',
	]);

	echo lmfe([
		
		"<hr><br>",
		
		['cat:cat_id','cat_name'=>'adsCat'],

		['text:name*','inDiv'],
		['url:link*','inDiv'],
		['file:image','inDiv'],

		"<br><hr><br>",

		['submit:ثبت','inDiv'],

	]);

	echo lmfc();

	?></div><?
}

-------------------------------------------------
echo listmaker_form('
	[!
		"table" => "plan" ,
		"action" => "./?page=admin&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["cp"]."_list",
		"name" => "'.__FUNCTION__.'" ,
		"class" => "'.__FUNCTION__.'" ,
		"switch" => "do",
	!]
		
		[!"cat:cat_id","cat_name"=>"adsCat","inDiv"!]
		[!"position:position_id","inDiv"!]
		
		<hr>

		[!"text:name","inDiv"!]
		[!"text:name_on_form","inDiv"!]
		[!"url:sample_page","inDiv"!]
		
		<hr>

		[!"file:icon","inDiv"!]

		[!"file:watermark","inDiv"!]
		[!"toggle:watermark_onlyfirst","inDiv"!]

		<hr>

		[!"toggle:search_box_color_flag","inDiv"!]
		[!"color:search_box_color","inDiv"!]
		[!"file:search_result_cover","inDiv"!]
		
		<hr>

		[!"toggle:show_in_index","inDiv"!]
		[!"toggle:suggest_as_related","inDiv"!]
		[!"toggle:send_in_newsletter","inDiv"!]
		[!"toggle:pin_in_all_cat","inDiv"!]
		[!"toggle:pin_in_own_cat","inDiv"!]
		[!"toggle:pin_in_search","inDiv"!]		
		
		<hr>

		'.$duration.'

		<hr>

		[!"submit:ثبت","inDiv"!]

	[!close!]
');
-------------------------------------------------

/*README*/

function lmfo( $list ){
	return listmaker_form_open( $list );
}

function listmaker_form_open( $list ){

	#
	# form table
	if( strstr($list['table'], '@') ){
		$TitleInTag = true;
		$GLOBALS['listmaker_form-TitleInTag'] = true;
		$list['table'] = str_replace( '@', '', $list['table'] );
	}
	$GLOBALS['listmaker_form-formTable'] = $list['table'];


	#
	# form name
	if(! $list['name'] ){
		$list['name'] = 'form'.substr(md5($list['table']),0,6);
	}
	$GLOBALS['listmaker_form-formName'] = $list['name'];

	#
	# rw
	if(! array_key_exists( 'rw' , $list ) ){

		if(! $list['table'] ){
			// echo __LINE__;

		} else if(! $id = $_REQUEST['id'] ){
			// echo __LINE__;

		} else if(! $rw = table( $list['table'] , $id ) ){
			// echo __LINE__;

		} else {
			// echo __LINE__;
			$GLOBALS['listmaker_form-rw'] = $rw;
		}

	} else {
		$GLOBALS['listmaker_form-rw'] = $list['rw'];
	}
	
	#
	# check if its having some id and name of save switch
	if($list['switch']!=''){
		if($id = $_REQUEST['id']){
			$switch_string = "&".$list['switch']."=saveEdit&id=".$id;
		} else {
			$switch_string = "&".$list['switch']."=saveNew";
		}
		$list['action'].= $switch_string;
	}
	
	$list['class'].= ' lmfo';
	$list['class'] = trim($list['class']);
	
	#
	# etc
	foreach ($list as $k => $r) {
		if(! in_array($k,['name','class','action','method','switch','table','rw','id']) ){
			$etc.= " $k=\"$r\"";
		}
	}
	
	#
	# burn the <form tag
	return '<form '.
		'action="'.$list['action'].'" '.
		'method="'.($list['method'] ? $list['method']:'POST').'" '.
		'enctype="multipart/form-data" '.
		'name="'.$list['name'].'" '.
		($list['id'] ? 'id="'.$list['id'].'" ':'').
		'class="'.$list['class'].'" '.
		($etc ?$etc :'').
		">\n";
	
}











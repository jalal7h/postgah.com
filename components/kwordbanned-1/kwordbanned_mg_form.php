<?

function kwordbanned_mg_form(){

	if( $_REQUEST['func']=='kwordbanned_mg_form' ){
		$id = $_REQUEST['id'];
	}
	
	echo lmfo([
		'table' => 'kwordbanned' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_list',
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
		'switch' => 'do',
	]);

	if(! $id ) {
		echo "<hr>\n";
	}

	echo lmfe([
		
		['text:kword',($id?'inDiv':'')],

		($id?"<hr>":'') ,

		['submit:ثبت',($id?'inDiv':'')],

	]);

	echo lmfc();

}


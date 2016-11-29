<?

# jalal7h@gmail.com
# 2016/11/29
# 1.1

function users_mg_remove(){
	
	$need_confirm = false;
	
	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if( $_REQUEST['confirm'] == '1' ){
		return users_mg_remove_confirm( $id );
	
	} else {
		echo "<script>if(confirm('".__("آیا مایل به حذف همه اطلاعات این کاربر هستید؟")."')){location.href='"._URL."/?page=admin&cp=".$_REQUEST['cp']."&do=".$_REQUEST['do']."&id=".$_REQUEST['id']."&p=".$_REQUEST['p']."&confirm=1';}</script>";
	}

}


function users_mg_remove_confirm( $id ){

	users_remove($id);
	jsgo( _URL."/?page=admin&cp=".$_REQUEST['cp']."&p=".$_REQUEST['p'] );

	die();
	
}




<?

function userprofile_form(){
	
	switch($_REQUEST['do2']){
		case 'save':
			return userprofile_save();
	}

	if(! $uid = user_logged() ){
		e( __FUNCTION__ . __LINE__ );
	} else if(!$rw = table("users", $uid)){
		e( __FUNCTION__ . __LINE__ );
	} else {

		echo '<div class="userprofile_form_head">پروفایل کاربر</div>';

		echo
		fm( array( 
			'name'=>'userprofile_form' , 
			'class'=>'userprofile_form' , 
			'action'=>'./?page='.$_REQUEST['page'].'&do='.$_REQUEST['do'].'&do2=save',
			'title_in_span'=>true,
			)).

		ff(array( lmtc("users:name"), 'n:name*'=>$rw, 'inDiv' )).
		ff(array( lmtc("users:username"), 'n:username*'=>$rw, 'inDiv' )).
		ff(array( lmtc("users:tell"), 'n:tell'=>$rw, 'inDiv' )).
		ff(array( lmtc("users:cell"), 'n:cell'=>$rw, 'inDiv' )).

		ff(array( lmtc("users:address"), 'n:address'=>$rw, 'inDiv' )).

		ff(array( lmtc("users:profile_pic") , 'n:profile_pic[]'=>$rw, 'inDiv', 'accept'=>'image/*' )).

		ff(array( lmtc("users:gender"), 'n:gender'=>$rw, 'option'=>array('1'=>'مذکر','2'=>'مونث'), 'inDiv' )).
		
		ff(array( lmtc("users:im_a"), 'n:im_a'=>$rw, 'inDiv' )).
		ff(array( lmtc("users:work_at"), 'n:work_at'=>$rw, 'inDiv' )).

		ff("br").
		ff("hr").
		ff("br").

		ff(array('t:submit','n:submit'=>'ثبت','class'=>'submit_button','inDiv'));

	}
}


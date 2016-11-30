<?

function ezTicket_user_list(){
	
	switch($_REQUEST['do2']){

		case 'ezTicket_user_form':
			ezTicket_user_form();
			return true;

		case 'ezTicket_user_save':
			ezTicket_user_save();
			break;
	}

	echo "<div class='ezTicket_user_list'>
	<input id='ezTicket_user_list_add' type='button' value='".__('ثبت درخواست جدید')."' onclick='location.href=\""._URL."/?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=ezTicket_user_form\"' /><div style=clear:both ></div>";

	$tdd = 10;
	$p = intval($_REQUEST['p']);
	$stt = $tdd * $p;
	
	if(!$uid = $_SESSION['uid']){
		echo "err - ".__LINE__;
	
	} else if(! $rs = dbq(" SELECT * FROM `ezticket_ticket` WHERE `uid`='$uid' ORDER BY `archived` ASC , `date` DESC LIMIT $stt , $tdd ") ){
		echo "err - ".__LINE__;
	
	} else if( dbn($rs)==0 ){
		echo convbox( __("هنوز درخواستی برای شما ثبت نشده است.") );
	
	} else while( $rw = dbf($rs) ){
		ezTicket_user_list_this( $rw );
	}

	echo "</div>";
	$__query = " SELECT * FROM `ezticket_ticket` WHERE `uid`='$uid' ";
	$__link = "?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&p=";

	echo listmaker_paging($__query, $__link, $tdd, $debug=false);
	
}








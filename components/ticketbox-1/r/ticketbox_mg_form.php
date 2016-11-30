<?

function ticketbox_mg_form(){
	
	if($id = $_REQUEST['id']){
		$rw = table("ticketbox", $id);
	
	} else {
		return false;
	}

	echo "<form class='ticketbox_mg_form' method='post' action='./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=ticketbox_mg_archive&do=ticketbox_mg_save&id=".$id."' >
		<textarea class='text' name='text' placeholder='".lmtc('ticketbox_post:text')." ...' ></textarea>
		<input type='submit' value='".__('ثبت')."' />
	</form>";

	ticketbox_mg_form_replies();
	
}

// http://127.0.0.1/PROJ/metan.ir/?page=admin&cp=ticketbox_mg&func=ticketbox_mg_waiting&do=ticketbox_mg_form&id=1&p=0&cat=

<?

function ezTicket_user_form(){
	
	if($id = $_REQUEST['id']){
		$rw = table("ezticket_ticket", $id);
	}

	echo "<form class='ezTicket_user_form' method='post' action='./?page=".$_REQUEST['page']."&do=".$_REQUEST['do']."&do2=ezTicket_user_save".( $rw ? "&id=".$id : "" )."' >
		<div class='head'>
		".( $rw ? "
			<div class='name'>".$rw['name']."</div>
			<div class='dept'>".cat_translate($rw['dept'])."</div>
			" : "
			<script>var isNewForm=1;</script>
			<input class='name' placeholder='".lmtc('ezticket_ticket:name')." ...' type='text' name='name' />
			<select class='dept' name='dept' ><option value=''>.. ".lmtc('ezticket_ticket:dept')." ..</option>".cat_display('ezticket_dept',false)."</select>
		")."
		</div>
		<textarea class='text' name='text' placeholder='".lmtc('ezticket_reply:text')."' ></textarea>
		<input type='submit' value='".__("ثبت")."' />
	</form>";

	ezTicket_user_form_replies();

}


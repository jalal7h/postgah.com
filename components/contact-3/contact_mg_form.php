<?

function contact_mg_form(){

	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $rw = table('contact',$id) ){
		e(__FUNCTION__,__LINE__);

	} else {
		
		echo "
		<div class='".__FUNCTION__."'>
				
			<div class='view'>
			
				<div class='subject'>".$rw['subject']."</div>
				
				<hr>

				<div class='detail'>
					
					<div class='from'>
						<span>از :</span>
						<b>".$rw['name']."</b>
						<div>&lt;".$rw['email']."&gt;</div>
					</div>
					
					<div class='to'>
						<span>به :</span>
						<b>".setting('tiny_title')."</b>
						<div>&lt;".$rw['to']."&gt;</div>					
					</div>
					
					<div class='date'>
						<span>تاریخ :‌</span>
						<div>".substr( U2Vaght($rw['date']), 0, 19 )."</div>
					</div>

				</div>

				<hr>
				
				<div class='content'>".nl2br($rw['content'])."</div>
				<a></a>
				
				<hr>

				<form method='post' action='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=send&id=".$_REQUEST['id']."&p=".$_REQUEST['p']."' class='form' >
					<textarea placeholder='ارسال پاسخ ...' name='reply_content' ></textarea>
					<input type='submit' value='ارسال' />
				</form>
			
			</div>

		</div>";

	}

	return false;

}


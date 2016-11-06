<?

function contact_mg_form(){

	if(! $id = $_REQUEST['id'] ){
		e();

	} else if(! $rw = table('contact',$id) ){
		e();

	} else {
		
		echo "
		<div class='".__FUNCTION__."'>
				
			<div class='view'>
							
				<hr>

				<div class='detail'>
					
					<div class='from'>
						<span>".__('از :')."</span>
						<b>".$rw['name']."</b>
						<div>&lt;".$rw['email']."&gt;</div>
					</div>
					
					<div class='to'>
						<span>".__('به :')."</span>
						<b>".setting('tiny_title')."</b>
						<div>&lt;".$rw['to']."&gt;</div>					
					</div>
					
					<div class='date'>
						<span>".__("تاریخ :‌")."</span>
						<div>".time_inword($rw['date'])."</div>
					</div>

				</div>

				<hr>
				
				<div class='content'>".nl2br($rw['content'])."</div>
				<a></a>
				
				<hr>

				<form method='post' action='./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=send&id=".$_REQUEST['id']."&p=".$_REQUEST['p']."' class='form' >
					<textarea placeholder='".__("ارسال پاسخ ...")."' name='reply_content' ></textarea>
					<input type='submit' value='".__("ارسال")."' />
				</form>
			
			</div>

		</div>";

	}

	return false;

}


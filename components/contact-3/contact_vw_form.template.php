
<div class="contact_vw_form">

	<div class="path">
		<div>{setting_rw("contact_address")["name"]} : {contact_address}</div>
		<div>{setting_rw("contact_tell")["name"]} : <span dir=ltr >{contact_tell}</div>
		<div>{setting_rw("contact_fax")["name"]} : <span dir=ltr >{contact_fax}</div>
	</div>

	<form method="post" action="{_URL}/<?=Slug::get('page',2)?>/send" >
		
		{token_make}

		<fieldset>
			
			<legend>
				<select id="contact_to" name="to" required>
					<option value="0"><lang>ارتباط با</lang> ..</option>
					{email_select_option}
				</select>
				
				<?if( $_REQUEST['to'] ):?>
				<script>$('#contact_to').val('{to}')</script>
				<?endif?>
			</legend>

			<img src="{_URL}/image_list/contact.jpg" class="handshaking" />
			
			<div class="right">
				
				<input placeholder="{lmtc('contact:name')}" type="text" name="name" required value="<?=$_REQUEST['name']?>">
				<?if( que::is('contact_vw_form_name') ):?>
				<div class="prompt"><?=que::pop('contact_vw_form_name')?></div>
				<?endif?>

				<input placeholder="{lmtc('contact:cell')}" type="text" class="numeric placeholder_fix" name="cell" value="{cell}">

				<input placeholder="{lmtc('contact:email')}" type="email" name="email" class="placeholder_fix" required value="{email}">
				<?if( que::is('contact_vw_form_email') ):?>
				<div class="prompt"><?=que::pop('contact_vw_form_email')?></div>
				<?endif?>
				
				<textarea placeholder="{lmtc('contact:content')}" required name="content" >{content}</textarea>
				<?if( que::is('contact_vw_form_content') ):?>
				<div class="prompt"><?=que::pop('contact_vw_form_content')?></div>
				<?endif?>

				{recaptcha}

				<input type="submit" value="<lang>ارسال</lang>" class="btn btn-primary" >

				<?if( que::is('contact_vw_form_dbs') ):?>
				<div class="prompt"><?=que::pop('contact_vw_form_dbs')?></div>
				<?endif?>

			</div>

		</fieldset>
	
	</form>

</div>





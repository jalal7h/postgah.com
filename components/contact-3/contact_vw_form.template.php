
<div class="contact_vw_form">

	<div class="path">
		<div>{setting_rw("contact_address")["name"]} : {contact_address}</div>
		<div>{setting_rw("contact_tell")["name"]} : <span dir=ltr >{contact_tell}</div>
		<div>{setting_rw("contact_fax")["name"]} : <span dir=ltr >{contact_fax}</div>
	</div>

	<form method="post" action="{_URL}/?page={page}&do=send" >
		
		{token_make}

		<fieldset>
			
			<legend>
				<select name="to">
					<option value="0"><lang>ارتباط با</lang> ..</option>
					{email_select_option}
				</select>
			</legend>

			<img src="{_URL}/image_list/contact.jpg" class="handshaking" />
			
			<div class="right">
				<input placeholder="{lmtc('contact:name')}" type="text" name="name" value="{name}">
				<input placeholder="{lmtc('contact:cell')}" type="text" class="numeric" name="cell" value="{cell}">
				<input placeholder="{lmtc('contact:email')}" type="email" name="email" value="{email}">
				<textarea placeholder="{lmtc('contact:content')}" name="content" >{content}</textarea>
				<input type="submit" value="<lang>ارسال</lang>" class="btn btn-primary" >
			</div>

		</fieldset>
	
	</form>

</div>





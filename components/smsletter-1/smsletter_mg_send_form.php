<?

function smsletter_mg_send_form(){

	switch ($_REQUEST['do']) {
		
		case 'send':
			return smsletter_mg_send_do();

	}

	?>
	<form method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&func=<?=$_REQUEST['func']?>&do=send" class="<?=__FUNCTION__?>">
		
		<div class="te-div">
			<div>متن پیامک</div>
			<textarea name="text" id="<?=__FUNCTION__?>_text"></textarea>
		</div>

		<label>
			<input type="checkbox" value="1" name="users_cell_list" id="users_cell_list" checked />
			<span>ارسال به شماره‌های کاربران
				<span style="color:green;">( <?=table(array( 'users' , 'count' , " AND `cell` LIKE '%9%' " ))?> شماره )</span>
			</span>
		</label>

		<label>
			<input type="checkbox" value="1" id="smsletter_mg_list_of_cell_checkbox" />
			<span>ارسال به شماره‌های دلخواه</span>
		</label>

		<div class="te-div" id="nlmg_list_of_cell">
			<div>شماره های همراه (با کاما ، ویرگول و یا خط به خط جدا کنید)</div>
			<textarea name="numb"></textarea>
		</div>

		<div class="divider"></div>
		
		<div>
			<input type="submit" value="ارسال" class="submit_button" />
		</div>

	</form>
	<?
}










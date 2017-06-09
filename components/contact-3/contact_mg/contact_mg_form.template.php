
<div class="contact_mg_form">
	
	<div class="view">
				
		<hr>
		<div class="detail">
			
			<div class="from">
				<span><lang>از :</lang></span>
				<b><?=$rw["name"]?></b>
				<div>&lt;<?=$rw["email"]?>&gt;</div>
			</div>
			
			<div class="to">
				<span><lang>به :</lang></span>
				<b>{setting("tiny_title")}</b>
				<div>&lt;<?=$rw["to"]?>&gt;</div>					
			</div>
			
			<div class="date">
				<span><lang>تاریخ :‌</lang></span>
				<div><?=time_inword($rw["date"])?></div>
			</div>

		</div>

		<hr>
		
		<div class="content"><?=nl2br($rw["content"])?></div>
		<a></a>
		
		<hr>

		<form method="post" action="{_URL}/?page=admin&cp={cp}&do=send&id={id}&p={p}" class="form" >
			<textarea placeholder="<lang>ارسال پاسخ</lang>" name="reply_content" ></textarea>
			<input type="submit" value="<lang>ارسال</lang>" />
		</form>
	
	</div>

</div>




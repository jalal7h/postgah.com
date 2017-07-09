<?

# jalal7h@gmail.com
# 2017/05/01
# 1.0

function nl_mg_send_form(){

	switch ($_REQUEST['do']) {
		
		case 'send':
			return nl_mg_send_do();

	}

	?>
	<form method="post" action="./?page=admin&cp=<?=$_REQUEST['cp']?>&func=<?=$_REQUEST['func']?>&do=send" class="<?=__FUNCTION__?>">
		
		<div class="te-div">
			<div><?=__('عنوان خبرنامه')?></div>
			<input type="text" name="subject" id="<?=__FUNCTION__?>_subject"/>
		</div>
		
		<div class="te-div">
			<div><?=__('متن خبرنامه')?></div>
			<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
			<script type="text/javascript" src="<?=_URL?>/components/layout-1/tinymce-set.js" ></script>
			<textarea name="text" class="tinymce" id="<?=__FUNCTION__?>_text"></textarea>
		</div>
	
		<label>
			<input type="checkbox" value="1" name="newsletter_email_list" id="newsletter_email_list" checked />
			<span><?=__('ارسال به ایمیل های ثبت شده در بخش خبرنامه')?>
				<span style="color:green;">( <?=table(array( 'newsletter' , 'count' ))?> <?=__('آدرس ایمیل')?> )</span>
			</span>
		</label>

		<label>
			<input type="checkbox" value="1" name="user_email_list" id="user_email_list" />
			<span><?=__('ارسال به ایمیل های کاربران')?>
				<span style="color:green;">( <?=table(array( 'user' , 'count' , " AND `email` LIKE '%@%' " ))?> <?=__('آدرس ایمیل')?> )</span>
			</span>
		</label>

		<label>
			<input type="checkbox" value="1" id="nlmg_list_of_emails_checkbox" />
			<span><?=__('ارسال به ایمیل های دلخواه')?></span>
		</label>

		<div class="te-div" id="nlmg_list_of_emails">
			<div><?=__('آدرس های ایمیل (با کاما ، ویرگول و یا خط به خط جدا کنید)')?></div>
			<textarea name="numb"></textarea>
		</div>

		<div class="divider"></div>
		
		<div>
			<input type="submit" value="<?=__('ارسال')?>" class="btn btn-primary" />
		</div>

	</form>
	<?
}










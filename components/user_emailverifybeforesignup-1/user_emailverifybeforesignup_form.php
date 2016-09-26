<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup_form(){

	?>
	<form method="post" action="./?page=<?=$_REQUEST['page']?>&do=send" id="<?=__FUNCTION__?>" >
		
		<?=token_make()?>
		
		<div class="container"> 
			<div class="d01">ثبت نام</div>
			<div class="d02">لطفا آدرس ایمیل خود را برای دریافت لینک تایید ایمیل وارد نمایید.</div>
			<input type="text" name="e" placeholder="Email address" dir="ltr" />
			<input type="submit" class="submit_button" value="ارسال" />
		</div>

	</form>
	<?
	
}


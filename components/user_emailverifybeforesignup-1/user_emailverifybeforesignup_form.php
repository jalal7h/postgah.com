<?

# jalal7h@gmail.com
# 2016/09/26
# 1.0

function user_emailverifybeforesignup_form(){

	?>
	<form method="post" action="./?page=<?=$_REQUEST['page']?>&do=send" id="<?=__FUNCTION__?>" >
		
		<?=token_make()?>
		
		<div class="container"> 
			<div class="d01"><?=__('ثبت نام')?></div>
			<div class="d02"><?=__('لطفا آدرس ایمیل خود را برای دریافت لینک تایید ایمیل وارد نمایید.')?></div>
			<input type="email" name="e" placeholder="<?=('Email address')?>" dir="ltr" />
			<input type="submit" class="btn btn-primary" value="<?=__('ارسال')?>" />
		</div>

	</form>
	<?
	
}


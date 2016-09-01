<?

function nl_index_save(){

	$icon_class = "error";
	if(! $email = trim($_REQUEST['email']) ){
		e( __FUNCTION__ , __LINE__ );
	} else if( table( array("newsletter", "email"=>$email) ) ){
		$text = "ایمیل قبلا ثبت شده است";
	} else if(! dbq(" INSERT INTO `newsletter` (`email`) VALUES ('$email') ") ){
		$text = "خطا در ثبت ایمیل";
	} else {
		$icon_class = "succeed";
		$text = "ثبت با موفقیت انجام شد";		
	}
	
	?>
	<div class="nl_index_save">
		<icon class="succeed"></icon>
		<div class="convbox">
			<?=$text?>
		</div>
	</div>
	<?
		
}


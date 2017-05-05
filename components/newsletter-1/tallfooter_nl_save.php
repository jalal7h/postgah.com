<?php

# jalal7h@gmail.com
# 2017/05/01
# 1.0

add_action('tallfooter_nl_save');

function tallfooter_nl_save(){
	
	if(! $email = $_REQUEST['email'] ){
		echo "<font color=\"orangered\">".__("هیچ ایمیلی وارد نشده است!")."</font>";

	} else if(! is_email_correct_or_not($email) ){
		echo "<font color=\"orangered\">".__("آدرس ایمیل معتبر نیست!")."</font>";

	} else if( table('newsletter', [ 'email'=>$email ] ) ){
		echo "<font color=\"yellow\">".__("آدرس ایمیل تکراری است!")."</font>";

	} else if(! dbs('newsletter', [ 'email'=>$email ] ) ){
		echo "<font color=\"orangered\">".__("اختلال در ثبت!")."</font>";
	
	} else {
		echo "<font color=\"#3af766\">".__("ثبت شد!")."</font>";
	} 

}


<?

function billing_management_users_activity( $user_id ){
	
	if(! $rw = table("users", $user_id) ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		echo "
		<div class='billing_management_users_activity' >
			<div class='name' >
				<span>نام : </span>
				<span>".$rw['name']." &lt;".$rw['username']."&gt;</span>
			</div>
			<div class='credit' >
				<span>اعتبار : </span>
				<span>".number_format(billing_userCredit($user_id))." تومان</span>
			</div>
		</div>";
	}

}


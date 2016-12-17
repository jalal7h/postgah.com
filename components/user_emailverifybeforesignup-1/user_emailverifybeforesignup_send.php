<?

# jalal7h@gmail.com
# 2016/12/17
# 1.1

function user_emailverifybeforesignup_send(){

	if(! $e = trim(strip_tags($_REQUEST['e'])) ){
		dg();

	} else if(! $e_enc = str_enc($e) ){
		dg();

	} else if( table('user', $e, null, 'username') ){
		echo convbox( __('آدرس ایمیل مورد نظر شما قبلا ثبت شده است.<br>%%بازگشت%%', ['<a href="javascript:history.go(-1);">', '</a>'] ) );

	} else if(! $h = user_emailverifybeforesignup_hash($e) ){
		dg();

	} else {

		$vars['user_email'] = $e;
		$vars['register_link'] = _URL."/?page="._PAGE."&e=".$e_enc."&h=".$h;
		
		echo texty( 'user_emailverifybeforesignup_send' , $vars, $e );

	}

}





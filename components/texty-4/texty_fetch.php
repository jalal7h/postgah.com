<?

# jalal7h@gmail.com
# 2016/12/16
# 2.2

#
# get or put template content
# echo texty( 'some_template_name' )['user_email_content'];
#

/*README*/


function texty_fetch( $slug ){
	
	if(! $rs = dbq(" SELECT * FROM `texty` WHERE `slug`='$slug' AND `flag`='1' LIMIT 1 ") ){
		e();
	
	} else if( dbn($rs) != 1 ){
		//
	
	} else {
		return dbf($rs);
	}

	return false;

}








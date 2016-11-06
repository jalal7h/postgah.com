<?

# jalal7h@gmail.com
# 2016/08/24
# 2.1

#
# get or put template content
# echo texty( 'some_template_name' )['user_email_content'];
#

/*README*/


function texty_fetch( $slug ){
	
	if(! $rs = dbq(" SELECT * FROM `texty` WHERE `slug`='$slug' AND `flag`='1' LIMIT 1 ") ){
		e(__FUNCTION__." : ".__LINE__);
	
	} else if( dbn($rs)!=1 ){
		// e(__FUNCTION__." : ".__LINE__." , texty $slug not defined");
	
	} else {
		return dbf($rs);
	}

	return false;
}








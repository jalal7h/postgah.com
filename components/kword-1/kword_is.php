<?

# jalal7h@gmail.com
# 2016/09/14
# 1.0

function kword_is( $kword ){

	if(! $kword = trim($kword) ){
		return false;
	
	} else if(! $rs = dbq(" SELECT * FROM `kword` WHERE `kword`='$kword' LIMIT 1 ") ){
		dg();
		return false;

	} else if(! dbn($rs) ) {
		return false;
	
	} else {
		return true;
	}

}

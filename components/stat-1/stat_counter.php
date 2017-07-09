<?

function stat_counter(){
	if(itsGoogle()){
		return true;
	} else {
		if(!$_SESSION['new-ip']){
			$_SESSION['new-ip'] = true;
			$new_ip = 1;
		} else {
			$new_ip = 0;
		}
		$ip = $_SERVER['REMOTE_ADDR'];
		$date = date("Y-m-d H:i:s", date("U")+3.5*3600);
		$refer = urldecode($_SERVER['HTTP_REFERER']);
		$uri = urldecode($_SERVER['REQUEST_URI']);
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(!dbq(" INSERT INTO `stat_counter` (`ip`,`date`,`refer`,`uri`,`agent`,`new_ip`) VALUES ('$ip','$date','$refer','$uri','$agent','$new_ip') ")){
			echo "err - ".__LINE__;
		} else {

		}
	}
}


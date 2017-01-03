<?

# jalal7h@gmail.com
# 2017/01/03
# 1.1

add_headtag( 'Canonical::tag' );

class Canonical {
	

	public static function tag(){

		if(! $link = self::link() ){
			return '';
		
		} else {
			return '<link rel="canonical" href="'.$link.'" />';
		}
		
	}


	public static function link(){

		# 
		# page
		if(  (sizeof($_GET) == 0)  or  
			 ( $_GET['page'] and (sizeof($_GET) == 1) )  or 
			 ( $_GET['page'] and $_GET['canonical_tag'] and (sizeof($_GET) == 2) )
		){

			if( _PAGE == 1 ){
				$link = _URL;
			
			} else {
				$link = layout_link(_PAGE);
			}
			
			
		#
		# dirty page
		} else if( strstr( $_SERVER['REQUEST_URI'], '?' ) ){
			return "";


		# 
		# canonical tag request
		} else if( $_GET['canonical_tag'] == 1 ){
			$link = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


		#
		# strange things
		} else {
			return "";
		}

		return $link;
	}


}


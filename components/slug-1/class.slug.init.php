<?

# jalal7h@gmail.com
# 2017/01/01
# 1.2

class Slug {


	public static function translate(){

		if( _URI == '/' ){
			return true;
		
		} else if( strstr( _URI, '?' ) ){
			return true;
			
		# 
		# file slug
		} else if( self::file() ){
			return true;

		#
		# database slug
		} else if( self::database() ){
			return true;

		} else {
			
			$the_request = $_REQUEST;
			
			if( $the_request['PHPSESSID'] ){
				unset($the_request['PHPSESSID']);
			}
			if( $the_request['_gat'] ){
				unset($the_request['_gat']);
			}
			if( $the_request['_ga'] ){
				unset($the_request['_ga']);
			}

			if( sizeof($the_request) == 0 ) {
				define( '_PAGE', ( $_REQUEST['page'] ? $_REQUEST['page'] : 1 ) );
				d404();
				
			} else {
				// var_dump($the_request);
				return true;
			}

		}

	}


	private static function file(){
		
		if( sizeof($GLOBALS['slug']) ){
			foreach( $GLOBALS['slug'] as $slug_pattern => $slug_path ){
				if( $path = self::pattern_matches( $slug_pattern, $slug_path ) ){
					self::pattern_set( $path );
					return true;
				}
			}
		}

		return false;
	}
    

	private static function database(){
		
		$the_slug = substr( _URI , 1 );
		$the_slug = urldecode($the_slug);
		
		if(! $path = table( 'slug', $the_slug, 'path', 'slug' ) ){
			return false;
		
		} else {
			self::pattern_set( $path );
			return true;
		}

	}


	private static function pattern_matches( $pattern, $path ){
		
		# if the first character if /faq is / remove it.
		if( substr( $pattern, 0, 1 ) == '/' ){
			$pattern = substr( $pattern , 1 );
		}

		# replace the $ with reg-exp
		$pattern = str_replace( '$', '(.*)', $pattern );
		
		$pattern = str_replace('/', '\/', $pattern );
		$pattern = "/" . $pattern . "_END_PATTERN/U";
		$subject = ( substr(_URI,0,1) == '/' ? substr(_URI,1) : _URI ) . "_END_PATTERN";
		
		preg_match_all ( $pattern, $subject, $matches );
		
		// echo $pattern."<br>";
		// echo $subject."<hr>";
		// var_dump($matches);
		
		if( $matches[0][0] == $subject ){
			for( $i=1; $i<sizeof($matches); $i++ ){
				$path = str_replace( '$'.$i , $matches[$i][0] , $path );
			}
			return $path;
		
		} else {
			return false;
		}

	}


	private static function pattern_set( $path ){

		if( strstr( $path, "?" ) ){
			$path = explode( '?', $path )[1];
		}

		$path = explode( '&', $path );

		foreach( $path as $param ){
			if( strstr($param, "=") ){
				list( $key , $value ) = explode( "=", $param );
				// echo "$key ==> $value<br>";
				$_GET[ $key ] = $value;
				$_REQUEST[ $key ] = $value;
			}
		}


	}


	public static function get( $table, $id ){

		if(! $rs = dbq(" SELECT * FROM `slug` WHERE `table_name`='$table' AND `table_id`='$id' LIMIT 1 ") ){
			e();

		} else if(! dbn($rs) ){
			// e();

		} else if(! $rw = dbf($rs) ){
			e();

		} else {
			return $rw['slug'];
		}

		return false;

	}


	# Slug::set( 'page', '3', 'about', './?page=3' );
	# Slug::set( 'page', '3', 'AboutMe' );
	public static function set( $table_name, $table_id, $slug, $path=null ){

		if(! $rs = dbq(" SELECT * FROM `slug` WHERE `table_name`='$table_name' AND `table_id`='$table_id' LIMIT 1 ") ){
			e();

		# 
		# insert
		} else if(! dbn($rs) ){
			if(! $path ){
				e();
			} else {
				if(! dbs( 'slug', [ 'slug'=>$slug, 'path'=>$path, 'table_name'=>$table_name, 'table_id'=>$table_id ] ) ){
					e();
				} else {
					return true;
				}
			}

		} else if(! $rw = dbf($rs) ){
			e();

		#
		# update
		} else {

			$set_array['slug'] = $slug;
			if( $path ){
				$set_array['path'] = $path;
			}

			if(! dbs( 'slug', $set_array, [ 'table_name'=>$table_name, 'table_id'=>$table_id ] ) ){
				e();

			} else {
				return true;
			}

		}

		return false;

	}


}








<?

# jalal7h@gmail.com
# 2016/12/31
# 1.0

class Installer {
	

	public function init(){

		self::db();
		self::htaccess();

	}


	private function db(){

		asort($GLOBALS['include_all_sql']);
		if(sizeof($GLOBALS['include_all_sql'])==0){
			return true;
		} else foreach($GLOBALS['include_all_sql'] as $k => $sql_path){
			
			#
			# get the content of sql file
			$sql_this = implode('',file($sql_path));
			if(strstr($sql_this, "\n--s"."pi--\n")){
				continue;
			}
			$sql_content.= $sql_this;
			$log_file++;

			#
			# archive the sql file
			$fpsql = fopen($sql_path, "a+");
			fwrite($fpsql, "\n--s"."pi--\n");
			fclose($fpsql);
		}

		if(!$sql_content = trim($sql_content)){
			return true;
		} else {
			$sql_content = str_ireplace("INSERT INTO ", "\n;cm_install;\nINSERT INTO ", $sql_content);
			$sql_content = str_ireplace("CREATE TABLE ", "\n;cm_install;\nCREATE TABLE ", $sql_content);
			$sql_content = str_ireplace("ALTER TABLE ", "\n;cm_install;\nALTER TABLE ", $sql_content);
			$sql_content = explode(";cm_install;\n", $sql_content);
			foreach($sql_content as $k => $query){
				if(!$query = trim($query)){
					continue;
				} else {
					$query_type = trim( substr($query,0,6) );
					$query_array[ $query_type ][] = $query;
				}
			}
			#
			# CREATE
			if( ! sizeof($query_array["CREATE"])){
				echo "no CREATE to do<br>";
			} else foreach($query_array["CREATE"] as $k => $query){
				if(!dbq($query)){
					echo "<hr>".$query;
					echo "<br>".dbe();
					echo "<hr>";
				} else {
					$log_create++;
				}
			}
			#
			# ALTER
			if( ! sizeof($query_array["ALTER"])){
				echo "no ALTER to do<br>";
			} else foreach($query_array["ALTER"] as $k => $query){
				if(!dbq($query)){
					echo "<hr>".$query;
					echo "<br>".dbe();
					echo "<hr>";
				} else {
					$log_alter++;
				}
			}
			#
			# INSERT
			if( ! sizeof($query_array["INSERT"])){
				echo "no INSERT to do<br>";
			} else foreach($query_array["INSERT"] as $k => $query){
				if(!dbq($query)){
					echo "<hr>".$query;
					echo "<br>".dbe();
					echo "<hr>";
				} else {
					$log_insert++;
				}
			}
			#
			# log display
			echo "<br>".$log_file." files executed."; 
			echo "<br>".$log_create." table created.";
			echo "<br>".$log_alter." alter done.";
			echo "<br>".$log_insert." insert done.";

			#
			# die only after install
			die();
		}
	}


	# 
	# take care of '# start' and '# end'
	function htaccess(){

		# drop loop
		if( $_REQUEST['do_action'] ){
			return true;

		# 
		# set flag to prevent reinstall of htaccess
		} else if( $GLOBALS['Installer::htaccess'] ){
			return true;
		}
		$GLOBALS['Installer::htaccess'] = true;

		#
		# pre sections
		$new_ht = "RewriteEngine On\n";
		// $new_ht.= "RewriteBase ".$RewriteBase."\n";
		$new_ht.= "# AddType application/x-httpd-php54 .php\n\n";


		foreach( $GLOBALS['include_all_htaccess'] as $k => $ht_path ){
			
			$new_ht_this = "# \n";
			$new_ht_this.= "# ". explode("/", $ht_path)[1] ."\n";

			if(! $ht_content = file($ht_path) ){
				//

			} else if(! sizeof($ht_content) ){
				//

			} else if(! $ht_content_text = implode('', $ht_content) ){
				//

			} else {
				foreach( $ht_content as $k2 => $v ){
					if( substr( trim($v),0,1) == "#" ){
						// its commented, we should wiave it
						unset($ht_content[$k2]);
					}
				}
				$ht_content = implode('', $ht_content);
			}

			$new_ht_this.= trim($ht_content);
			$new_ht_this.= "\n\n";
			
			if( strstr( $ht_content_text , '# start' ) ){
				$new_ht_start.= $new_ht_this;

			} else if( strstr( $ht_content_text , '# end' ) ){
				$new_ht_end.= $new_ht_this;

			} else {
				$new_ht.= $new_ht_this;
			}

		}


		$new_ht = 
			( $new_ht_start ? "\n\n#\n# Start Section\n\n".$new_ht_start : '' ).
			"\n\n#\n# Middle Section\n\n".
			$new_ht.
			( $new_ht_end ? "\n\n#\n# End Section\n\n".$new_ht_end : '' );


		if(! file_exists(".htaccess") ){
			$old_ht = "";

		} else {
			$old_ht = trim( file_get_contents(".htaccess") );
		}


		if( trim($new_ht) == trim($old_ht) ){
			// e("htaccess same as past");

		} else {
			$fp = fopen(".htaccess", "w");
			fwrite($fp, $new_ht);
			fclose($fp);
			e("htaccess updated.");
		}


	}


}





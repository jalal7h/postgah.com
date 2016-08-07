<?

# jalal7h@gmail.com
# 2016/05/13
# Version 1.0

function kword_mg_fileSave(){

	if(! $csv_path = $_FILES['kword_excel']['tmp_name'][0] ){
		e(__FUNCTION__,__LINE__);

	} else if(! $csv = implode('', file($csv_path)) ){
		e(__FUNCTION__,__LINE__);

	} else {

		$csv = str_replace( array("\r\n", "\n"), ',', $csv );
		$csv = explode( ',', $csv );

		if( sizeof($csv) ){
			foreach ($csv as $i => $kword) {
				
				if(! $kword = trim($kword) ){
					continue;

				} else if( dbq(" INSERT INTO `kword` (`kword`) VALUES ('$kword') ") ){
					$insert_done++;
				}

			}
		}

		if( $insert_done ){
			echo "<div class='convbox' >".$insert_done." کلمه جدید ثبت شد.</div>";
		} else {
			echo "<div class='convbox' >کلمه جدیدی ثبت نشد.</div>";
		}

	}

}








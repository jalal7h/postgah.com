<?

# jalal7h@gmail.com
# 2016/11/28
# 1.1

/*
$GLOBALS['seo_sitemap'][] = array( 
	"query" => " some query with *,date ",
	"link" => 'some link with php support'
);
/*README*/	

$GLOBALS['do_action'][] = "seo_sitemap";

function seo_sitemap(){
	
	$date = date("Y-m-d\TH:i:s\+00:00", U());
	
	header('Content-Type: text/xml, charset=utf-8');
	echo '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.google.com/schemas/sitemap/0.84"><url><loc>'._URL.'/</loc><lastmod>'.$date.'</lastmod><changefreq>always</changefreq><priority>1</priority></url>';

	if(! sizeof($GLOBALS['seo_sitemap']) ){
		//

	} else foreach ($GLOBALS['seo_sitemap'] as $k => $r) {
		
		$query = $r['query'];
		$link0 = $r['link'];

		if(! $query ){
			echo "no query defined in seo_sitemap";

		} else if(! $rs = dbq($query) ){
			echo dbe();

		} else if(! dbn($rs) ){
			e();

		} else for( $i=0; $i<dbn($rs); $i++ ){
			
			#
			# get the main variables
			if(! $rw = dbf($rs) ){
				e();
			}

			eval("\$link = $link0;");
			
			if( intval($rw['date']) != '0' ){
				$the_date = date( "Y-m-d\TH:i:s\+00:00", $rw['date'] );
			} else {
				$the_date = $date;
			}

			#
			# echo row
			echo "
			<url>
				<loc>$link</loc>
				<lastmod>$the_date</lastmod>
				<priority>0.5</priority>
				<changefreq>daily</changefreq>
			</url>";

		}
	}

	echo "</urlset>";

}








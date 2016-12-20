<?

# jalal7h@gmail.com
# 2016/12/20
# 2.0

$GLOBALS['do_action'][] = "seo_sitemap_mega";

function seo_sitemap_mega(){


    ################################################
    # limits
    #
    if( defined('seo_sitemap_count_in_page') ){
        $tdd = seo_sitemap_count_in_page;
    } else {
        $tdd = 5;
    }
    #
    ################################################



    ################################################
    # xml start
    #
    header('Content-Type: text/xml, charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>'."\n".
	'<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
    #
    ################################################



    ################################################
    # sitemap list
    #
    foreach ($GLOBALS['seo_sitemap'] as $id => $info) {
       
        $count_in_query = dbn( dbq( $info['query'] ) );
        $count_of_pages = ceil( $count_in_query / $tdd );

        // echo $count_in_query."\n";
        // echo $count_of_pages."\n";

        $query = $info['query'];
        $query.= " " . trim($query) . " LIMIT 1 ";
        $query = str_replace(" ASC LIMIT 1 ", " DESC LIMIT 1 ", $query);

        if(! $rs = dbq($query) ){
            $date = U();
        } else if(! $date = dbr($rs, 0, 'date') ){
            $date = U();
        }

        $date = date('c', $date);

        for( $j=0; $j<$count_of_pages; $j++ ){
            if( $j == 0 ){
                $link = _URL.'/sitemap/'.$id.'.xml';
            } else {
                $link = _URL.'/sitemap/'.$id.'-'.$j.'.xml';                
            }
            echo 
    		"\t<sitemap>\n".
    		"\t\t<loc>$link</loc>\n".
    		"\t\t<lastmod>$date</lastmod>\n".
    		"\t</sitemap>\n";
        }


	}
    #
    ################################################



    ################################################
    # xml end
    #
	echo "</sitemapindex>";
    #
    ################################################
	


}

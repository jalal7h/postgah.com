<?

# jalal7h@gmail.com
# 2017/05/01
# 1.1

add_action('seo_rss_mega');

function seo_rss_mega(){
	
	echo template_engine( 'seo_rss_mega', [ 'rss_array' => seo_rss_array() ] );

}

function seo_rss_array(){

    foreach( $GLOBALS['seo_rss'] as $id => $info ){

        if( $lmtc = lmtc($id) ){
            $name = $lmtc[1];
        } else {
            $name = $id;
        }

        $link = _URL.'/rss/'.$id.'.xml';
        $rss_array[] = [ 'link' => $link , 'name' => $name ];

    }

    return $rss_array;

}


<?

# jalal7h@gmail.com
# 2017/06/04
# 1.0

function layout_post_extra( $layer ){
	
	$layer['data'] = str_ireplace( "</textarea>", "&lt;/textarea&gt;", $layer['data'] );
	$layer['data'] = stripcslashes( $layer['data'] );

	echo template_engine( 'layout_post_extra', [ 'layer' => (object) $layer ] );

}


function post_extra( $layer ){
	return layout_post_extra( $layer );
}





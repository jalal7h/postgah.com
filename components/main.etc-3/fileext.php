<?php

# jalal7h@gmail.com
# 2017/06/15
# 1.0

function fileext( $filepath ){
	
	return strtolower( pathinfo($filepath)['extension'] );

}


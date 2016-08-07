<?

function convbox( $text, $dir=null ){

	return '<div class="convbox" '.( $dir ? 'style="direction: '.$dir.';" ' : '' ).'>'.$text.'</div>';
}


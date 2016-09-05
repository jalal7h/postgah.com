<?

$GLOBALS['block_layers']['pgCat_main'] = 'لیست اصلی دسته بندی';

function pgCat_main( $rw_pagelayer ){
	
	?>
	<div class="pgCat_main">
		<div class="head"><?=$rw_pagelayer['name']?></div>
	<?

	if(! $rs_cat = dbq(" SELECT * FROM `cat` WHERE `cat`='adsCat' AND `parent`='0' AND `flag`='1' ORDER BY `prio` ASC ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs_cat) ){
		echo convbox("هنوز دسته ای ثبت نشده است");

	} else while( $rw_cat = dbf($rs_cat) ){
		echo pgCat_main_this( $rw_cat );
	}

	?></div><?

}

function pgCat_main_this( $rw_cat ){
	
	$img_title = trim($rw_cat['name']." , ".$rw_cat['desc']);

	$c = "
	<a class=\"pgCat_main_this\" href=\"".pgCat_link($rw_cat)."\">
		<img src=\"".pgCat_image( $rw_cat )."\" alt=\"".$img_title."\" title=\"".$img_title."\" />
		<div>".$rw_cat['name']."</div>
	</a>
	";

	return $c;

}



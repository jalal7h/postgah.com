<?

$GLOBALS['block_layers']['pgCat_main'] = 'لیست اصلی دسته بندی';

function pgCat_main( $rw_pagelayer ){
	
	if(! $cats = table( 'cat', [ 'cat'=>'adsCat', 'parent'=>0, 'flag'=>1 ], [ 'prio'=>'asc' ] ) ){
		echo convbox("هنوز دسته ای ثبت نشده است");

	} else {

		foreach( $cats as $i => $rw_cat ){
			
			$cat = (object) $rw_cat;
			
			$cat->alt = trim( $rw_cat['name']." , ".$rw_cat['desc'] );
			$cat->link = pgCat_link( $rw_cat );
			$cat->image = pgCat_image( $rw_cat );
			
			$cats[$i] = $cat;

		}

		echo template_engine( 'pgCat_main', [ 'layer_name'=>$rw_pagelayer['name'], 'cats'=>$cats ] );

	}

}




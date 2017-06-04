<?

# jalal7h@gmail.com
# 2017/01/16
# 1.2

function layout_mg_this_layer( $page_id, $pos="center" ){

	if( $pos=='center' ){
		$pos = '';
	
	}

	$we_have_column_pos = is_column('page_layer', 'pos');

	?>
	<div feed="<?=str_enc('page_layer/admin')?>" class="the_layers sortable">
		<?

		if(! $rs = dbq(" SELECT * FROM `page_layer` WHERE `page_id`='$page_id' ".( $we_have_column_pos ? " AND `pos`='$pos' " : "" )." ORDER BY `prio` ASC , `id` ASC ") ){
			e(__FUNCTION__,__LINE__);
		
		} else if(! dbn($rs) ){
			layout_mg_this_layer_this();

		} else while( $rw = dbf($rs) ){
			$rw['pos'] = $pos;
			layout_mg_this_layer_this( $rw );
		}

		?>
		<a href="<?=_URL?>/?page=admin&cp=<?=$_REQUEST['cp']?>&page_id=<?=$page_id?>&pos=<?=$pos?>&do=layer_form" class="new"><?=__('لایه جدید')?></a>
	</div>
	<?

}


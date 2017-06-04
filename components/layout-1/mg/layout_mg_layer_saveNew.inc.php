<?

# jalal7h@gmail.com
# 2017/01/07
# 1.1

function layout_mg_layer_saveNew(){

	if( $we_have_column_pos = is_column('page_layer', 'pos') ){
		$pos = $_REQUEST['pos'];
	}

	#
	# generate new prio
	$name = trim($_REQUEST['name']);
	
	if(! $func = $_REQUEST['func'] ){
		e();
	
	} else if(! $page_id = $_REQUEST['page_id'] ){
		e();
	
	} else if(! $rs = dbq(" SELECT `prio` FROM `page_layer` WHERE `page_id`='$page_id' ".( $we_have_column_pos ? " AND `pos`='$pos' " : "" )." ORDER BY `prio` DESC LIMIT 1 ") ){
		e();
	
	} else {
		
		if( dbn($rs)==1 ){
			$prio = intval(dbr($rs,0,0)) + 1;
		
		} else {
			$prio = 1;
		}

		if( is_column('page_layer', 'hide_name') ){
			$name_hide_column = ", `hide_name`";
			$name_hide_value = ", '".$_REQUEST['hide_name']."'";
		}

		#
		# insert new  layer
		if(! dbq(" INSERT INTO `page_layer` (`page_id`, ".( $we_have_column_pos ? "`pos`," :"" )." `prio`,`func`,`type`,`name` $name_hide_column ,`framed`,`flag`) VALUES ('$page_id', ".( $we_have_column_pos ? "'$pos'," :"" )." '$prio','$func','HTML', '$name' $name_hide_value , '1', '1' ) ")){
			e();
		
		} else {
			$id = dbi();
			?>
			<script type="text/javascript">
				location.href = './?page=admin&cp=<?=$_REQUEST['cp']?>&do=layer_form&id=<?=$id?>';
			</script>
			<?
			die();
		}

	}

}









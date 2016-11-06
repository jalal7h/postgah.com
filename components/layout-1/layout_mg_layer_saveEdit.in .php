<?

function layout_mg_layer_saveEdit(){

	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbs( 'page_layer', ['name','func'], ['id'] ) ){
		e( __FUNCTION__ , __LINE__ );
		echo dbe();
	
	} else {
		?>
		<script type="text/javascript">
			location.href = './?page=admin&cp=<?=$_REQUEST['cp']?>&id=<?=$id?>&do=layer_form';
		</script>
		<?
		die();
	}

}


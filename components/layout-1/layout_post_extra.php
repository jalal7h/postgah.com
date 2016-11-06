<?

function layout_post_extra( $rw_pagelayer ){
	
	$rw_pagelayer['data'] = str_ireplace( "</textarea>", "&lt;/textarea&gt;", $rw_pagelayer['data'] );
	
	?>
	<script src="http://parsunix.com/cdn/js/tinymce/tinymce-set+func.js"></script>
	<textarea name="data" id="_data" ><?=$rw_pagelayer['data']?></textarea>

	<label class="framed_label">
		<input type="checkbox" name="framed" <?=($rw_pagelayer['framed']? "checked" :"")?> value="1" >
		<span>فريم اضافه شود</span>
	</label>

	<div class="types">
		<label><input type="radio" name="type" onclick="tinyMCE_off('_data'); $('#_data').prop('dir','rtl');" value="TEXT" >Text</label>
		<label><input type="radio" name="type" onclick="tinyMCE_on('_data'); $('#_data').prop('dir','rtl');" value="HTML" >HTML</label>
		<label><input type="radio" name="type" onclick="tinyMCE_off('_data'); $('#_data').prop('dir','ltr');" value="PHP5" >PHP</label>
	</div>

	<script>
	$(document).ready(function(){
		
		$('.<?=__FUNCTION__?> .types input[value="<?=$rw_pagelayer['type']?>"]').prop( "checked", true );
		
		<? if($rw_pagelayer['type']=='PHP5'){ ?>
			$('#_data').prop('dir','ltr');
		<? } ?>
		
		<? if($rw_pagelayer['type']=='HTML'){ ?>
			$(window).load(function(){
				tinyMCE_on('_data');
			});
		<? } ?>
		
	});
	</script>

	<?

}


function post_extra( $rw_pagelayer ){
	return layout_post_extra( $rw_pagelayer );
}





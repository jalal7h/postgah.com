<?

function layout_post_extra( $rw_pagelayer ){
	
	$rw_pagelayer['data'] = str_ireplace( "</textarea>", "&lt;/textarea&gt;", $rw_pagelayer['data'] );
	
	?>

	<script src="modules/tinymce/tinymce.min.js"></script>
	<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->
	<script src="modules/tinymce/tinymce-set+func.js"></script>
	
	<textarea name="data" class="tinymce" id="_data" ><?=$rw_pagelayer['data']?></textarea>

	<label class="framed_label">
		<input type="checkbox" name="framed" <?=($rw_pagelayer['framed']? "checked" :"")?> value="1" >
		<span><?=__("فريم اضافه شود")?></span>
	</label>

	<div class="types">
		<label><input type="radio" name="type" onclick="tinyMCE_off('_data'); $('#_data').prop('dir','<?=_rtl?>');" value="TEXT" >Text</label>
		<label><input type="radio" name="type" onclick="tinyMCE_on('_data'); $('#_data').prop('dir','<?=_rtl?>');" value="HTML" >HTML</label>
		<label><input type="radio" name="type" onclick="tinyMCE_off('_data'); $('#_data').prop('dir','ltr');" value="PHP5" >PHP</label>
	</div>

	<script>
	$(document).ready(function(){
		
		$('.<?=__FUNCTION__?> .types input[value="<?=$rw_pagelayer['type']?>"]').prop( "checked", true );
		<?

		if( $rw_pagelayer['type'] == 'PHP5' ){
			echo "$('#_data').prop('dir','ltr');\n";
		}

		if( $rw_pagelayer['type'] == 'HTML' ){
			echo "$(window).load(function(){	tinyMCE_on('_data');	});\n";

		} else {
			echo "$(window).load(function(){	tinyMCE_off('_data');	});\n";
		}

		?>
	});
	</script>

	<?

}


function post_extra( $rw_pagelayer ){
	return layout_post_extra( $rw_pagelayer );
}






<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{_URL}/modules/tinymce/tinymce-set-func.js"></script>

<div class="{template_name}">

	<textarea name="data" class="tinymce" id="_data" ><?= $layer->data ?></textarea>

	<label class="framed_label">
		<input type="checkbox" name="framed" <?= ( $layer->framed ? "checked" : "" ) ?> value="1" >
		<span><lang>فريم اضافه شود</lang></span>
	</label>

	<div class="types">
		<label><input type="radio" name="type" value="TEXT" >Text</label>
		<label><input type="radio" name="type" value="HTML" >HTML</label>
		<label><input type="radio" name="type" value="PHP5" >PHP</label>
	</div>

</div>

<script>
	$(document).ready(function(){
		$('.{template_name} .types input[value="<?= $layer->type ?>"]').prop( "checked", true );
		<?= ( $layer->type == 'TEXT' ? "$(window).load(function(){ tinyMCE_off('_data'); });\n" : '' ) ?>
		<?= ( $layer->type == 'HTML' ? "$(window).load(function(){ tinyMCE_on('_data'); });\n" : '' ) ?>
		<?= ( $layer->type == 'PHP5' ? "$('#_data').prop('dir','ltr');\n" : '' ) ?>
	});
</script>




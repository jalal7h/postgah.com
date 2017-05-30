/*print*/

if( typeof tinymce !== 'undefined' ){

	if( lang_dir == 'ltr' ){
		default_align = 'left';
	} else {
		default_align = 'right';
	}
cl( default_align);
	tinymce.init({

		selector:'textarea.tinymce',
		height:'200',

		plugins: "paste",
		paste_data_images: true,

		directionality : 'rtl',
		theme_advanced_toolbar_align : default_align,

		content_css : _URL + "/templates/Default/font/font.css,"+_URL+"/styles.css",

		plugins: [
			"advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table contextmenu directionality emoticons template textcolor paste textcolor"
		],

		fontsize_formats: "8px 9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 20px 22px 24px 30px 36px 42px 60px 72px 84px 90px",
		font_formats: 'DefaultFont=DefaultFont;Tahoma=tahoma;Sans Serif=sans-serif;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace',

		toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
		toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

		menubar: false,
		toolbar_items_size: 'small',

		style_formats: [
			{title: 'Bold text', inline: 'b'},
			{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			{title: 'Example 1', inline: 'span', classes: 'example1'},
			{title: 'Example 2', inline: 'span', classes: 'example2'},
			{title: 'Table styles'},
			{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			],
			templates: [
				{title: 'Test template 1', content: 'Test 1'},
				{title: 'Test template 2', content: 'Test 2'}
		]
		
	});

}



<?

function kword_mg_fileForm(){


	echo lmfo([
		'table' => 'kword' ,
		'action' => './?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_list&do=fileSave',
		'name' => __FUNCTION__ ,
		'class' => __FUNCTION__ ,
	]);

	echo '<div id="lmfe_inDiv_'.__FUNCTION__.'_kword_head">'.__('ثبت کلمات کلیدی !').'</div>';
	echo '<div id="lmfe_inDiv_'.__FUNCTION__.'_kword_text">'.__('برای ثبت کلمات کلیدی جدید فایل اکسل حاوی کلمات جدید را با پسوند csv آپلود کنید.<br>همچنین فایل متنی با پسوند txt').'</div>';

	echo lmfe([
		

		[ __('فایل اکسل / متنی'), 'file:kword_excel*@', 'accept'=>'.txt,.csv', 'inDiv'],

		"<hr>",

		['submit:'.__('ثبت'),'inDiv'],

	]);

	echo lmfc();

}


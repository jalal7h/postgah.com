<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.2

add_component( 'kword_mg', 'کلمات کلیدی', '292' );

function kword_mg(){

	#
	# actions
	switch ($_REQUEST['do']) {

		case 'fileSave':
			kword_mg_fileSave();
			break;

		case 'form':
			return kword_mg_fileForm();

		case 'saveNew':
			kword_mg_fileSave();
			break;

		case 'removeAll':
			foreach($_REQUEST['removeAll'] as $kword_id){
				dbrm('kword', $kword_id, true);
			}
			break;
			
	}

	#
	# the list
	kword_mg_list();

}



















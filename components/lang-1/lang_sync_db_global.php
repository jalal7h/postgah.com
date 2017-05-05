<?

# jalal7h@gmail.com
# 2017/01/23
# 1.1

function lang_sync_db_global(){

	# $GLOBALS['cmp']['useraccess_mg'] = 'مدیران';
	if( sizeof($GLOBALS['cmp']) ){
		foreach( $GLOBALS['cmp'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}

	# $GLOBALS['block_layers']['user_forgot_form'] = 'فرم فراموشی کلمه عبور';
	if( sizeof($GLOBALS['block_layers']) ){
		foreach( $GLOBALS['block_layers'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}
	if( sizeof($GLOBALS['block_layers_side']) ){
		foreach( $GLOBALS['block_layers_side'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}
	if( sizeof($GLOBALS['block_layers_center']) ){
		foreach( $GLOBALS['block_layers_center'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}

	# $GLOBALS['userpanel_item'][ 94 ] = [ 'userprofile_form', 'پروفایل کاربر', '007' ];
	if( sizeof($GLOBALS['userpanel_item']) ){
		foreach( $GLOBALS['userpanel_item'] as $i => $record ){
			$text = $record[2];
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}

	# $GLOBALS['tallfooter_element']['hr'] = 'جدا کننده';
	if( sizeof($GLOBALS['tallfooter_element']) ){
		foreach( $GLOBALS['tallfooter_element'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}

	# $GLOBALS['mss_list']['texty_email'] = 'پیامهای پیشفرض';
	if( sizeof($GLOBALS['mss_list']) ){
		foreach( $GLOBALS['mss_list'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}
	
	# $GLOBALS['setting']['texty_mg'] = 'پیام های پیشفرض';
	if( sizeof($GLOBALS['setting']) ){
		foreach( $GLOBALS['setting'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}

	#$GLOBALS['cat_items']['product-weight'] = ['رده‌های وزنی کالا', $inDashboard=false, ... ];
	if( sizeof($GLOBALS['cat_items']) ){
		foreach( $GLOBALS['cat_items'] as $i => $record ){
			
			if( isset($record['name']) ){
				$text = $record['name'];
			
			} else if( isset($record[0]) ){
				$text = $record[0];
			}

			if( $text ){
				$arr[ ":".lang_hash($text) ] = $text;
			}

		}
	}

	# $GLOBALS['billing_method']['wallet'] = 'کیف پول';
	if( sizeof($GLOBALS['billing_method']) ){
		foreach( $GLOBALS['billing_method'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}
	
	# ccf
	if( sizeof($GLOBALS['catcustomfield-select-options']) ){
		foreach( $GLOBALS['catcustomfield-select-options'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}
	
	# $GLOBALS['billing_method']['ticketbox_viewUserTicketList'] = 'تیکت‌ها';
	if( sizeof($GLOBALS['adminusertab']) ){
		foreach( $GLOBALS['adminusertab'] as $i => $text ){
			$arr[ ":".lang_hash($text) ] = $text;
		}
	}


	return $arr;

}




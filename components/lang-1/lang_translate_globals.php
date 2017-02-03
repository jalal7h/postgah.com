<?

# jalal7h@gmail.com
# 2017/01/29
# 1.3

add_init( function(){

	#
	if( $_REQUEST['do_action'] == 'lang_sync_db' ){
		return true;
	}

	# $GLOBALS['cmp']['useraccess_mg'] = 'مدیران';
	if( sizeof($GLOBALS['cmp']) ){
		foreach ( $GLOBALS['cmp'] as $i => $text ){
			$GLOBALS['cmp'][$i] = __( $text );
		}
	}

	# $GLOBALS['block_layers']['user_forgot_form'] = 'فرم فراموشی کلمه عبور';
	if( sizeof($GLOBALS['block_layers']) ){
		foreach( $GLOBALS['block_layers'] as $i => $text ){
			$GLOBALS['block_layers'][$i] = __( $text );
		}
	}
	if( sizeof($GLOBALS['block_layers_side']) ){
		foreach( $GLOBALS['block_layers_side'] as $i => $text ){
			$GLOBALS['block_layers_side'][$i] = __( $text );
		}
	}
	if( sizeof($GLOBALS['block_layers_center']) ){
		foreach( $GLOBALS['block_layers_center'] as $i => $text ){
			$GLOBALS['block_layers_center'][$i] = __( $text );
		}
	}


	# $GLOBALS['userpanel_item'][ 94 ] = [ 'userprofile_form', 'پروفایل کاربر', '007' ];
	if( sizeof($GLOBALS['userpanel_item']) ){
		foreach( $GLOBALS['userpanel_item'] as $i => $record ){
			$GLOBALS['userpanel_item'][$i][2] = __( $GLOBALS['userpanel_item'][$i][2] );
		}
	}

	# $GLOBALS['tallfooter_element']['hr'] = 'جدا کننده';
	if( sizeof($GLOBALS['tallfooter_element']) ){
		foreach( $GLOBALS['tallfooter_element'] as $i => $text ){
			$GLOBALS['tallfooter_element'][$i] = __( $text );
		}
	}

	# $GLOBALS['mss_list']['texty_email'] = 'پیامهای پیشفرض';
	if( sizeof($GLOBALS['mss_list']) ){
		foreach( $GLOBALS['mss_list'] as $i => $text ){
			$GLOBALS['mss_list'][$i] = __( $text );
		}
	}
	
	# $GLOBALS['setting']['texty_mg'] = 'پیام های پیشفرض';
	if( sizeof($GLOBALS['setting']) ){
		foreach( $GLOBALS['setting'] as $i => $text ){
			$GLOBALS['setting'][$i] = __( $text );
		}
	}

	#$GLOBALS['cat_items']['product-weight'] = ['رده‌های وزنی کالا', $inDashboard=false, ... ];
	if( sizeof($GLOBALS['cat_items']) ){
		foreach( $GLOBALS['cat_items'] as $i => $record ){
			if( isset($GLOBALS['cat_items'][$i][0]) ){
				$GLOBALS['cat_items'][$i][0] = __( $GLOBALS['cat_items'][$i][0] );
			}
			if( isset($GLOBALS['cat_items'][$i]['name']) ){
				$GLOBALS['cat_items'][$i]['name'] = __( $GLOBALS['cat_items'][$i]['name'] );
			}
		}
	}

	# $GLOBALS['billing_method']['wallet'] = 'کیف پول';
	if( sizeof($GLOBALS['billing_method']) ){
		foreach( $GLOBALS['billing_method'] as $i => $text ){
			$GLOBALS['billing_method'][$i] = __( $text );
		}
	}

	# ccf
	if( sizeof($GLOBALS['catcustomfield-select-options']) ){
		foreach( $GLOBALS['catcustomfield-select-options'] as $i => $text ){
			$GLOBALS['catcustomfield-select-options'][$i] = __( $text );
		}
	}

}, null );





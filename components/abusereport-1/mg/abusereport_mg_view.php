<?

# jalal7h@gmail.com
# 2017/06/04
# 1.3

function abusereport_mg_view(){

	#
	# actions
	switch ($_REQUEST['do2']) {
		
		case 'remove_item':
			abusereport_mg_removeItem();
			break;

		case 'remove_userItems':
			abusereport_mg_remove_userItems();
			break;

		case 'remove_abusereport':
			abusereport_mg_removeAbusereport();
			break;
		
	}

	#
	# no id found
	if(! $id = $_REQUEST['id'] ){
		e();

	#
	# no report related to this id
	} else if(! $rw_ar = table('abusereport', $id) ){
		e();
	
	} else {

		if(! $item_title = lmtc($rw_ar['table_name'])[0] ){
			$item_title = __("آیتم");
		}
		if(! $item_title_s = lmtc($rw_ar['table_name'])[1] ){
			$item_title_s = __("آیتم‌ها");
		}

		#
		# anonymous reporter
		if(! $rw_ar['user_id'] ){
			//

		# invalid good user
		} else if(! $rw_theGoodUser = table('user', $rw_ar['user_id']) ){
			//
		}

		#
		# item already removed
		if(! $rw_item = table( $rw_ar['table_name'], $rw_ar['table_id'] ) ){
			//

		# 
		# no user_id column assigned
		} else if(! is_column( $rw_ar['table_name'], 'user_id' ) ){
			//

		# 
		# no user assigned to item
		} else if(! $rw_item['user_id'] ){
			//

		# user does not exist
		} else if(! $rw_theBadUser = table('user', $rw_item['user_id'] ) ){

		}


		echo "<div class=\"abusereport_mg_view\" >";
		
		if(! $rw_item ){
			echo "<div class=\"case removed\">".__("گزارش تخلف %% به شناسه %% - قبلا حذف شده است.", [ $item_title, $rw_ar['table_id'] ] )."</div>";
		
		} else {

			$func_link = $rw_ar['table_name']."_link";

			echo "<div class=\"case\">".__('گزارش تخلف در مورد')." ".$item_title.": ".( function_exists($func_link) ? "<a href=\"".$func_link($rw_item)."\" target=\"_blank\" >".$rw_item['name']."</a>" : $rw_item['name'] )."</div>";

		}

		echo "<div class=\"date\">".time_inword( $rw_ar['date_created'] )."</div>";
		echo "<div class=\"text\">".nl2br($rw_ar['text'])."</div>";

		echo "<div class=\"sub\">";

		if( $rw_theGoodUser ){

			$GoodUserLink = is_component('userprofile')
				? userprofile_link($rw_theGoodUser['id']) 
				: user_loginLink($rw_theGoodUser['id']);

			echo __('گزارش از طرف')." <a href=\"".$GoodUserLink."\" target=\"_blank\">".$rw_theGoodUser['name']."</a> (<a href=\"".user_loginLink($rw_theGoodUser['id'])."\" target=\"_blank\">".__('ورود')."</a>)";
		}

		if( $rw_theGoodUser and $rw_theBadUser ){
			echo " ، ".__("در مورد ");
		}

		if( $rw_theBadUser ){
			
			$BadUserLink = is_component('userprofile') 
				? userprofile_link($rw_theBadUser['id'])
				: user_loginLink($rw_theBadUser['id']);

			echo "$item_title ".__("ثبت شده توسط")." <a href=\"".$BadUserLink."\" target=\"_blank\">".$rw_theBadUser['name']."</a> (<a href=\"".user_loginLink($rw_theBadUser['id'])."\" target=\"_blank\">".__('ورود')."</a>)";
		}
		
		echo "<div>".__('نوع تخلف')." :‌ ".cat_translate($rw_ar['cat_id'])."</div>";

		echo "</div>"; // sub


		#
		# the links
		echo "<div class=\"links\">";
		$base_link = _URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func'];
		
		if( $rw_item ){
			
			#
			# remove the bad item
			$remove_item_link = $base_link."&do=view&id=".$rw_ar['id']."&do2=remove_item";
			echo "<a onclick=\"if(!confirm('".__('آیا مایله به حذف هستید؟')."')){return false;}\" class=\"btn btn-primary red\" href=\"".$remove_item_link."\" >".__('حذف %%',[$item_title])."</a>";

		}

		if( $rw_theBadUser ){
			
			#
			# remove all items of bad user
			$removeUserItems_link = $base_link."&do=view&id=".$rw_ar['id']."&do2=remove_userItems&user_id=".$rw_theBadUser['id'];
			echo "<a onclick=\"if(!confirm('".__('آیا مایله به حذف هستید؟')."')){return false;}\" class=\"btn btn-primary red\" href=\"".$removeUserItems_link."\" >".__("حذف همه %% از این کاربر",[$item_title_s])."</a>";
			
			#
			# remove bad user and all of his things
			$removeBadUser_link = $base_link."&do=remove_user&id=".$rw_ar['id']."&user_id=".$rw_theBadUser['id'];
			echo "<a onclick=\"if(!confirm('".__('آیا مایله به حذف هستید؟')."')){return false;}\" class=\"btn btn-primary red\" href=\"".$removeBadUser_link."\" >".__("حذف کامل این کاربر")."</a>";

		}

		# 
		# remove this report
		$remove_abusereport_link = _URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&do=remove&id=".$rw_ar['id'];
		echo "<a class=\"btn btn-primary red\" href=\"".$remove_abusereport_link."\" >".__("حذف این گزارش")."</a>";


		if( $rw_theBadUser ){
			
			echo "<div abusereport_id=\"".$id."\" class=\"etc\">";
			
			if( $email = is_email_correct_or_not($rw_theBadUser['email']) ){
				echo "<a email=\"$email\" text_textMessage=\"".__('متن ایمیل ..')."\" text_sendButton=\"".__('ارسال')."\" class=\"mailToBadUser\" >".__("ایمیل به ثبت‌کننده %%",[$item_title])."</a>";
			}

			if( is_component('sms') and (setting('sms_state') == 1) and ($numb = user_cellNumber($rw_theBadUser)) ){
				if( $email ){
					echo "، ";
				}
				echo "<a numb=\"$numb\" text_textMessage=\"".__('متن پیامک ..')."\" text_sendButton=\"".__('ارسال')."\" class=\"smsToBadUser\" >".__("پیامک به ثبت‌کننده %%",[$item_title])."</a>";
			}

			echo "</div>";

		}


		echo "</div>"; // links
		echo "</div>"; // abusereport_mg_view

	}

}








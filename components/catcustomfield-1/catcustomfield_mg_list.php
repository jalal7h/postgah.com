<?php

# jalal7h@gmail.com
# 2017/01/17
# 1.0

function catcustomfield_mg_list(){
	
	if(! $cat_id = intval($_REQUEST['cat_id']) ){
		return e();

	} else if(! $rw = table("cat", $cat_id) ){
		return e();
	}
	
	echo "<div class='header'>".__("خصیصه‌های %%", [$rw['name'] ])."</div>";
	
	echo "<div class=\"list_w\">";
	echo convbox( __('موردی یافت نشد.') );

	if(! $rw_s = table('catcustomfield', ['cat_id'=>$cat_id,'wrapper'=>'0'] ) ){
		js('$(\'.catcustomfield_mg .list_w .convbox\').show();');
	} else {
		js('$(\'.catcustomfield_mg .list_w .convbox\').hide();');
	}

	echo "<div cat_id=\"$cat_id\" class=\"list sortable\" feed=\"".str_enc('catcustomfield/admin')."\" >";

	if( $rw_s ){
		foreach ($rw_s as $i => $rw) {
			catcustomfield_mg_list_this( $rw );
		}
	}

	echo "</div>"; // list
	echo "</div>"; // list_w

	echo "<div class='footer'>
		<a href=\"javascript:history.go(-1)\" class=\"btn btn-default\" >".__('بازگشت')."<a/>
		<a href=\"\" class=\"btn btn-primary catcustomfield_mg_add\" >".__('خصیصه‌ جدید')."<a/>
	</div>";

}


function catcustomfield_mg_list_this( $rw ){

	if(! $rw['grid'] = intval($rw['grid']) ){
		$rw['grid'] = 12;
	}

	echo "<div the_id=\"".$rw['id']."\" class=\"field_w grid".$rw['grid']."\">";
	echo "<div ".( $rw['flag']==0 ? 'class="off"' : '' )." >

		<div class=\"tools\">
			<icon class=\"fa fa-toggle-".( $rw['flag']==0 ? 'off' : 'on' )." toggle\"></icon>
			<icon class=\"fa fa-remove remove\"></icon>
			<icon class=\"fa fa-minus-square less\"></icon>
			<icon class=\"fa fa-plus-square more\"></icon>
		</div>

		<div class=\"text\">
			<span class=\"type\">".$GLOBALS['catcustomfield-select-options'][ $rw['type'] ]."</span><span class=\"name\">".( $rw['name'] ? $rw['name'] : '<i>'.__('ثبت نشده').'</i>' )."</span>
		</div>

	</div></div>";

}









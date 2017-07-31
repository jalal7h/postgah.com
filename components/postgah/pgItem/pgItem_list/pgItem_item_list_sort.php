<?php

# jalal7h@gmail.com
# 2017/07/25
# 1.0

function pgItem_item_list_sort(){
	
	return listmaker_form('
		[!"action"=>"somewhere","method"=>"get"!]
			
			[!"positionbox:position_id/rrqs=a"'.( $_REQUEST['position_id'] ? '=>'.$_REQUEST['position_id'] : '' ).',"شهر","notInDiv"!]
			
			<select rrqs="a" name="sort" class="sort">
				<option value="newest">جدیدترین</option>
				<option value="cheapest">ارزانترین</option>
				<option value="mostExpensive">گرانترین</option>
				<option value="mostVisited">پربازدیدترین</option>
			</select>
			'.( $_REQUEST['sort'] ? '<script>$("select.sort[name=\'sort\']").val("'.$_REQUEST['sort'].'")</script>' : '' ).'

		[!close!]
	');
	
}


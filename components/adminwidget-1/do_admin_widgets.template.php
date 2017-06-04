
<div class="admin_widgets">

	<div class="head"><lang>پیشخوان مدیریت</lang></div>

	<div class="widget_list"><!--
 --><?foreach( $widgets as $widget ):?><!--
	 --><div class="widget_wrapper grid<?=$widget['grid']?>">
			<div class="widget<?=( $widget['cover'] ? ' cover' : '')?> <?=$widget['func']?>"><?=$widget['content']?></div>
		</div><!--
 --><?endforeach?><!--
 --></div>

</div>

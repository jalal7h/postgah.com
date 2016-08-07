<?

# jalal7h@gmail.com
# 2016/07/29
# 1.2


function webstatus_check(){
	
	if( is_admin() ){
		return true;

	} else if( is_action() ){
		return true;

	} else if( setting('webstatus_main')!=1 ){
		
		echo layout_open();
		
		?>
		<style>
			table.webstatus_main {
				width: 100vw;
				height: 100vh;
				direction: rtl;
				background-color: #f4f2ed;
				color: #666;
			}
			table.webstatus_main td {
				vertical-align: middle;
				font-size: 28px;
				text-align: center;
			}
		</style>
		<table class="webstatus_main" ><tr><td><?=setting('webstatus_main_content')?></td></tr></table>
		<?

		echo layout_close();

		die();
	}

}



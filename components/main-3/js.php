<?php

# jalal7h@gmail.com
# 2017/01/18
# 1.1

function js( $code ){
	?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			<?=$code?>
		});
	</script>
	<?
}


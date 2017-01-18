<?

# jalal7h@gmail.com
# 2016/07/10
# Version 1.0

function do_admin_mainbar(){

	echo "<div class=\"mainbar\">";

		echo "<div class='top'>";
			echo template_engine('do_admin_breadcrumb');
			echo template_engine('do_admin_links');
		echo "</div>";

		do_admin_dashboard();
		admin_footer();

	echo "</div>";
	
}

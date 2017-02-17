<?

# jalal7h@gmail.com
# 2017/01/22
# 1.1

function do_admin_mainbar(){

	echo "<div class=\"mainbar\">";

		echo "<div class='top'>";
			do_admin_breadcrumb();
			echo template_engine('do_admin_links');
		echo "</div>";

		do_admin_dashboard();
		admin_footer();

	echo "</div>";
	
}

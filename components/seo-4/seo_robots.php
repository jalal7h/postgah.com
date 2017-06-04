<?php

# jalal7h@gmail.com
# 2017/06/04
# 1.0

add_action('seo_robots');

function seo_robots(){
	
	header("Content-Type: text/plain");
	echo setting('html_robots_txt');

}


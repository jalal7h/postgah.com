<?

# jalal7h@gmail.com
# 2016/03/07
# Version 1.2.0

#
# php version check
if(file_exists('components/.codec')and((!function_exists('zend_version'))or(version_compare(phpversion(),'5.4.99', '>')))){
	die("We need php 5.4 for Content Machine");
}

#
# include all things
include_once('components/inc.inc');

#
# start the job
do_action();
do_index();


<?php

# jalal7h@gmail.com
# 2017/01/22
# 1.0

/**
* some general information of the website.
*/
class site
{
	
	
	public function name()
	{
		return setting('tiny_title');
	}

	public function title()
	{
		return setting('main_title');
	}

	public function logo()
	{
		return _URL.'/'.setting('site_logo');
	}

	public function icon()
	{
		return _URL.'/'.setting('site_ico');
	}


}


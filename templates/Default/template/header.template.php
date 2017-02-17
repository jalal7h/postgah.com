
<header>
	
	<div class="middle">
		
		<a alt="{main_title}" title="{main_title}" class="logo-container" href="{_URL}"><img alt="{main_title}" title="{main_title}" src="{_URL}/{site_logo}"/></a>

		{pgSearch_form}

		<?if(! user_logged() ):?>
			<a href="{_URL}/<?=Slug::get('page',60)?>" class="login_or_register">ورود / عضویت</a>
		<?elseif(! is_userPanel() ):?>
			<a href="{_URL}/<?=Slug::get('page',14)?>" class="login_or_register">محیط کاربری</a>
		<?endif?>

		<?if(! strstr($_SERVER['REQUEST_URI'], '/userpanel/items/new' ) ):?>
			<a href="{_URL}/<?=Slug::get('page',14)?>/items/new" class="new_ads">ارسال آگهی رایگان</a>
		<?endif?>

		{breadcrumb}

	</div>

	{anchor_back_to_admin_if_logged}
	
</header>



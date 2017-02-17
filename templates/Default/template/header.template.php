
<header>
	
	<div class="middle">
		
		<a alt="{main_title}" title="{main_title}" class="logo-container" href="{_URL}"><img alt="{main_title}" title="{main_title}" src="{_URL}/{site_logo}"/></a>
		
		{pgSearch_form}

		<a href="{_URL}/<?=Slug::get('page',14)?>/items/new" class="new_ads">ارسال آگهی رایگان</a>
		<?if( user_logged() ):?>
			<a href="{_URL}/<?=Slug::get('page',14)?>" class="login_or_register">محیط کاربری</a>
		<?else:?>
			<a href="{_URL}/<?=Slug::get('page',60)?>" class="login_or_register">ورود / عضویت</a>
		<?endif?>

		{breadcrumb}

	</div>

	{anchor_back_to_admin_if_logged}
	
</header>




<header class="page_{_PAGE}">
	
	<div class="middle">
		
		<a alt="{main_title}" title="{main_title}" class="logo-container" href="{_URL}"><img alt="{main_title}" title="{main_title}" src="{_URL}/{site_logo}"/></a>

		{pgSearch_form}

		<?if(! user_logged() ):?>
			<a href="{_URL}/<?=Slug::getSlugByName('login')?>" class="login_or_register">ورود / عضویت</a>
		<?elseif(! is_userPanel() ):?>
			<a href="{_URL}/<?=Slug::getSlugByName('userpanel',14)?>" class="login_or_register">محیط کاربری من</a>
		<?endif?>

		<?if(! strstr($_SERVER['REQUEST_URI'], '/userpanel/items/new' ) ):?>
			<a href="{_URL}/<?=Slug::getSlugByName('userpanel',14)?>/items/new" class="new_ads">ارسال آگهی رایگان</a>
		<?endif?>

		<?if( $_REQUEST['page'] == 171 ):?>
			<style>
				header {
					margin-bottom: 30px !important;
				}	
			</style>
		<?else:?>
			{breadcrumb}
		<?endif?>

	</div>

	{anchor_back_to_admin_if_logged}
	
</header>



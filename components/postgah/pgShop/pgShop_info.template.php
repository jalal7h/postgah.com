
<div class="pgShop_info">

	<img class="logo" src="{logo}"/>
	<div class="desc">
		<div class="head">شرح فعالیت</div>
		<span>{desc}</span>
	</div>
	<div class="address">
		<div class="head">آدرس</div>
		<span>{address}</span>
	</div>
	<div class="phone">
		<div class="head">تلفن</div>
		<?if( sizeof($phones) ):?>
		<?foreach( $phones as $phone ):?>
			<span><?=$phone?></span>
		<?endforeach?>
		<?endif?>
	</div>

</div>


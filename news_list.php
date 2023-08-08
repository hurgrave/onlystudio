<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<html lang="ru">
<head><title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/favicon.604825ed.ico" type="image/x-icon">
    <link href="css/common.css" rel="stylesheet">
</head>
<body>
	

<div id="barba-wrapper">
	
<div class="article-list">

<!--Циклом перебираем массив из инфоблока-->

<?php foreach($arResult["ITEMS"] as $arItem): ?>

	<!--Рожаем ссылку на полный текст новости (но не закрываем /а)-->
	<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
		<a class="article-item article-list__item" href="<?$arItem["DETAIL_PAGE_URL"]?>" data-anim="anim-3">
	<?endif?>
		
	<!--Подкладываем фоновую картинку (с проверкой наверное)-->
	
	<div class="article-item__background">
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" 	data-src="xxxHTMLLINKxxx0.39186223192351520.41491856731872767xxx" 			alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"/>
		<?endif?>
	</div>
	
		<!--Раздел текста новости-->
        <div class="article-item__wrapper">
			
			<!--Заголовок новости делаем тут-->
           	<div class="article-item__title">
			<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
				<?echo $arItem["NAME"]?>
			<?endif?>
			</div>
			
			<!--Лид-текст делаем здесь-->
           	<div class="article-item__content">
			<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
				<?echo $arItem["PREVIEW_TEXT"];?>
			<?endif;?>
			</div>
		</div></a>
	
<?endforeach;?>
	
	</div>
	
</div>
</body>
</html>

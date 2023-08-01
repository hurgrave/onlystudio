<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-list">

<?
// A breadcrumbs string sits here. Didn't need that but let it live 
if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>


<?
/* Actually had no time to write a newslist of my own so I just copied a one from /bitrix/templates/books
to /local/templates (read never to store templates in /bitrix dir) and adapted. But...fairly, no adaptation
is needed. The one here works fine.
*/

// Here it builds a list. Was frustrated by an unknow syntax of foreach(): . 
	foreach($arResult["ITEMS"] as $arItem):?>
	<p class="news-item">

		<?php 
		/* Information block (the ИНФОБЛОК). КОроче плевать, буду писать по-русски раз переключился
		 * В общем тут в arResult тот самый инфоблок в виде массива и мы из него достаем картинку с
		 * параметрами html  и ссылкой
		 */
		?>

		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img class="preview_picture" border="0" src="
			<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" 
			height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>" 
			title="<?=$arItem["NAME"]?>" style="float:left" /></a>
		<?endif?>

		<?php
		// Здесь у нас имя новости из инфоблока и линк на новость, в общем все то же самое что и картинка
		// Ну и проверки на доступ, валидность имени, наличие ссылки на полный текст и выборка по параметру
		// NAME (если NAME, то показывай загловок новости).
		?>

		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && 
			$arResult["USER_HAVE_ACCESS"])):?>
				<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a><br />
			<?else:?>
				<b><?echo $arItem["NAME"]?></b><br />
			<?endif;?>
		<?endif;?>

		<?php
		// Здесь лид-текст. С примерно такими же проверками как и выше. Потом в шаблоне еще очищают стиль.
		?>

		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<?echo $arItem["PREVIEW_TEXT"];?>
		<?endif;?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<div style="clear:both"></div>
		<?endif?>

		<?php
		// Здесь дата и время, тоже из $arResult, который массив
		?>

		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<br /><span class="news-date-time"><img src="<?=$templateFolder?>/images/clocks.gif" 
			width="9" height="9" border="0" alt="">&nbsp;<?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<?endif?>

		<?php 
		// Здесь проверка на наличие комментариев на форуме. 
		?>

		<?if (isset($arItem["DISPLAY_PROPERTIES"]["FORUM_MESSAGE_CNT"])):?>
			<span class="news-date-time">|&nbsp;<img src="<?=$templateFolder?>/images/comments.gif" 
			width="10" height="10" border="0" alt="">&nbsp;комментариев: 
			<?=$arItem["DISPLAY_PROPERTIES"]["FORUM_MESSAGE_CNT"]["VALUE"]?></span>
		<?endif?>

		<?php 
		// Тут рейтинг смотрят. Можно было бы убрать, если бы я врал что это мой код
		?>

		<?if (isset($arItem["DISPLAY_PROPERTIES"]["rating"])):?>
			<span class="news-date-time">|&nbsp;<img src="<?=$templateFolder?>/images/rating.gif" 
			width="11" height="11" border="0" alt="">&nbsp;Рейтинг: 
			<?=$arItem["DISPLAY_PROPERTIES"]["rating"]["VALUE"]?></span>
		<?endif?>
	</p>
<?endforeach;?>

		<?php 
		// Ну и тут снова хлебные крошки
		?>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

</div>

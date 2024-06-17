<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var array $arResult
 * @var array $arParam
 * @var CBitrixComponentTemplate $this
 */

$this->setFrameMode(true);
$this->addExternalCss("/bitrix/css/main/grid/pagenavigation.css");

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>


<ul class="pagination pagination--with-navigation" data-js-content-preloader-pagination>

	<?if ($arResult["NavPageNomer"] > 1) {?>
		<?if($arResult["bSavePage"]) {?>
			<li class="pagination__item">
				<a class="pagination__link pagination__link--prev"
					href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"
				>
					<svg class="i-icon">
						<use xlink:href="#icon-arrow--left"></use>
					</svg>
				</a>
			</li>
		<?} else {?>
			<?if ($arResult["NavPageNomer"] > 2) {?>
				<li class="pagination__item">
					<a class="pagination__link pagination__link--prev"
						href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"
					>
						<svg class="i-icon">
							<use xlink:href="#icon-arrow--left"></use>
						</svg>
					</a>
				</li>
			<?} else {?>
				<li class="pagination__item">
					<a class="pagination__link pagination__link--prev"
						href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"
					>
						<svg class="i-icon">
							<use xlink:href="#icon-arrow--left"></use>
						</svg>
					</a>
				</li>
			<?}?>
		<?}?>
	<?} else {?>
		<li class="pagination__item">
			<a href="#" class="pagination__link pagination__link--prev pagination__link--disabled">
				<svg class="i-icon">
					<use xlink:href="#icon-arrow--left"></use>
				</svg>
			</a>
		</li>
	<?}?>



	<?if ($arResult["NavPageNomer"] > 1) {?>
		<?if ($arResult["nStartPage"] > 1) {?>
			<?if($arResult["bSavePage"]) {?>
				<li class="pagination__item">
					<a class="pagination__link"
						href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"
					>1</a>
				</li>
			<?} else {?>
				<li class="pagination__item">
					<a class="pagination__link"
						href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"
					>1</a>
				</li>
			<?}?>
			<?if ($arResult["nStartPage"] > 2) {?>
				<li class="pagination__item">
					<a class="pagination__link"
						href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>"
					>...</a>
				</li>
			<?}?>
		<?}?>
	<?}?>


	<?do {?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) {?>
			<li class="pagination__item">
				<span class="pagination__link pagination__link--current"><?=$arResult["nStartPage"]?></span>
			</li>
		<?} elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false) {?>
			<li class="pagination__item">
				<a class="pagination__link"
					href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"
				><?=$arResult["nStartPage"]?></a>
			</li>
		<?} else {?>
			<li class="pagination__item">
				<a class="pagination__link"
					href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"
				><?=$arResult["nStartPage"]?></a>
			</li>
		<?}?>
		<?$arResult["nStartPage"]++;?>
	<?} while($arResult["nStartPage"] <= $arResult["nEndPage"]);?>

	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {?>
		<?if ($arResult["nEndPage"] < $arResult["NavPageCount"]) {?>
			<?if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)) {?>
				<li class="pagination__item">
					<a class="pagination__link"
						href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>"	
					>...</a>
				</li>
			<?}?>
			<li class="pagination__item">
				<a class="pagination__link"
					href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"
				><?=$arResult["NavPageCount"]?></a>
			</li>
		<?}?>
	<?}?>

	<li class="pagination__item">
		<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {?>
			<li class="pagination__item">
				<a class="pagination__link pagination__link--next"
					href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"
				>
					<svg class="i-icon">
						<use xlink:href="#icon-arrow--right"></use>
					</svg>
				</a>
			</li>
		<?} else {?>
			<li class="pagination__item">
				<a href="#" class="pagination__link pagination__link--next pagination__link--disabled">
					<svg class="i-icon">
						<use xlink:href="#icon-arrow--right"></use>
					</svg>
				</a>
			</li>
		<?}?>
	</li>


</ul>



<?/*

<div class="main-ui-pagination">
<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
?>

<?
if($arResult["bDescPageNumbering"] === true):
?>
	<div class="main-ui-pagination-pages">
		<div class="main-ui-pagination-label"> 1<?=GetMessage("MAIN_UI_PAGINATION__PAGES")?></div>
		<div class="main-ui-pagination-pages-list">
<?
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
			if($arResult["bSavePage"]):
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1</a>
<?
			else:
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
<?
			endif;
			if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=intval($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2)?>">...</a>
<?
			endif;
		endif;
	endif;

	do
	{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
			<span class="main-ui-pagination-page main-ui-pagination-active"><?=$NavRecordGroupPrint?></span>
<?
		elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
<?
		else:
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
<?
		endif;

		$arResult["nStartPage"]--;
	}
	while($arResult["nStartPage"] >= $arResult["nEndPage"]);

	if ($arResult["NavPageNomer"] > 1):
		if ($arResult["nEndPage"] > 1):
			if ($arResult["nEndPage"] > 2):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] / 2)?>">...</a>
<?
			endif;
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?></a>
<?
		endif;
	endif;
?>
		</div>
	</div>

	<div class="main-ui-pagination-arrows">
<?
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if($arResult["bSavePage"]):
?>
			<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></a>
<?
		else:
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></a>
<?
			else:
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></a>
<?
			endif;
		endif;
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-prev"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></span>
<?
	endif;

	if ($arResult["bShowAll"]):
		if ($arResult["NavShowAll"]):
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("MAIN_UI_PAGINATION__PAGED")?></a>
<?
		else:
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("MAIN_UI_PAGINATION__ALL")?></a>
<?
		endif;
	endif;

	if ($arResult["NavPageNomer"] > 1):
?>
		<a class="main-ui-pagination-arrow main-ui-pagination-next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("MAIN_UI_PAGINATION__NEXT")?></a>
<?
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-next"><?=GetMessage("MAIN_UI_PAGINATION__NEXT")?></span>
<?
	endif;
?>
	</div>
<?
else:
	?>
	<div class="main-ui-pagination-pages">
		<div class="main-ui-pagination-label"><?=GetMessage("MAIN_UI_PAGINATION__PAGES")?></div>
		<div class="main-ui-pagination-pages-list">
<?
	if ($arResult["NavPageNomer"] > 1):
		if ($arResult["nStartPage"] > 1):
			if($arResult["bSavePage"]):
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1</a>
<?
			else:
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
<?
			endif;
			if ($arResult["nStartPage"] > 2):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">...</a>
<?
			endif;
		endif;
	endif;

	do
	{
		if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
?>
			<span class="main-ui-pagination-page main-ui-pagination-active"><?=$arResult["nStartPage"]?></span>
<?
		elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
<?
		else:
?>
			<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
<?
		endif;
		$arResult["nStartPage"]++;
	}
	while($arResult["nStartPage"] <= $arResult["nEndPage"]);

	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
		if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
?>
				<a class="main-ui-pagination-page main-ui-pagination-dots" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">...</a>
<?
			endif;
?>
				<a class="main-ui-pagination-page" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
<?
		endif;
	endif;
?>
		</div>
	</div>

	<div class="main-ui-pagination-arrows">
<?
	if ($arResult["NavPageNomer"] > 1):
		if($arResult["bSavePage"]):
?>
			<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></a>
<?
		else:
			if ($arResult["NavPageNomer"] > 2):
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></a>
<?
			else:
?>
				<a class="main-ui-pagination-arrow main-ui-pagination-prev" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></a>
<?
			endif;

		endif;
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-prev"><?=GetMessage("MAIN_UI_PAGINATION__PREV")?></span>
<?
	endif;

	if ($arResult["bShowAll"]):
		if ($arResult["NavShowAll"]):
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("MAIN_UI_PAGINATION__PAGED")?></a>
<?
		else:
?>
			<a class="main-ui-pagination-arrow" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("MAIN_UI_PAGINATION__ALL")?></a>
<?
		endif;
	endif;

	if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
?>
		<a class="main-ui-pagination-arrow main-ui-pagination-next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><?=GetMessage("MAIN_UI_PAGINATION__NEXT")?></a>
<?
	else:
?>
		<span class="main-ui-pagination-arrow main-ui-pagination-next"><?=GetMessage("MAIN_UI_PAGINATION__NEXT")?></span>
<?
	endif;
?>
	</div>
<?
endif;
?>
</div>
*/?>

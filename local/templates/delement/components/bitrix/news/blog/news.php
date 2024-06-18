<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
	die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

$arListValue = [];
$property_enums = CIBlockPropertyEnum::GetList(Array("ID"=>"ASC"), Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "CODE"=>"HASHTAGS"));
while($enum_fields = $property_enums->GetNext()) {
	$arListValue[] = $enum_fields;
}
$arListValueFilter = [];
$arListIdFilter = [];
if($_GET["tag"]) {
    $arTag = explode(",", $_GET["tag"]);
    foreach($arListValue as $enum_fields) {
        if(in_array($enum_fields["ID"], $arTag)) {
            $arListValueFilter[] = $enum_fields["VALUE"];
            $arListIdFilter[] = $enum_fields["ID"];
        }
    }
}
$currPage = $APPLICATION->GetCurPage(false);
?>


<div class="page-blog__ctrl">

	<div 
		class="page-blog__collapse-wrapper" 
		data-js-expand='{"visibleItems":"10"}'
	>
		<div class="page-blog__ctrl-row">
			<div class="page-blog__no-collapse-row">

				<?if($arParams["USE_SEARCH"]=="Y") {?>
					<?php
						$APPLICATION->IncludeComponent(
						"bitrix:search.form",
						"blog",
						[
							"PAGE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["search"]
						],
						$component,
							['HIDE_ICONS' => 'Y']
					);

				}?>

				<button class="page-blog__collapse-button" data-js-expand-btn>
					<span class="show-more">Ещё тэги</span>
					<svg class="page-blog__collapse-btn-icon show-more" width="15" height="10">
						<use href="#icon-arrow"></use>
					</svg>

					<span class="show-less">Скрыть тэги</span>
					<svg class="page-blog__collapse-btn-icon show-less" width="15" height="10">
						<use href="#icon-arrow"></use>
					</svg>
				</button>
			</div>
			<div class="page-blog__collapse-container">
				<div class="tags tags-slider">
					<div class="tags__container swiper-container ">
						<div class="tags__wrapper swiper-wrapper" data-js-expand-item-container>

							<?foreach($arListValue as $key => $item) {?>
								<div class="tags__item swiper-slide">
									<a href="<?=$currPage.'?tag='.$item["ID"]?>" 
										class="checkbox__emulator <?=in_array($item["ID"], $arListIdFilter) ? 'active' : ''?>"
									><?=$item["VALUE"]?> </a>
								</div>
							<?}?>                                        
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?
$GLOBALS['arrFilter'] = ["PROPERTY_HASHTAGS_VALUE" => $arListValueFilter];

$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"blog-list",
	[
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"NEWS_COUNT" => $arParams["NEWS_COUNT"],
		"SORT_BY1" => $arParams["SORT_BY1"],
		"SORT_ORDER1" => $arParams["SORT_ORDER1"],
		"SORT_BY2" => $arParams["SORT_BY2"],
		"SORT_ORDER2" => $arParams["SORT_ORDER2"],
		"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
		"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
		"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"COUNT_WORDS" => $arParams["COUNT_WORDS"],
		"FILTER_NAME" => "arrFilter",
        "USE_FILTER" => "Y",
	],
	$component,
	['HIDE_ICONS' => 'Y']
);

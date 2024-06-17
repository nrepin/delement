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
$APPLICATION->SetPageProperty("PAGE_CLASS", 'page-article page-article--new');

?>
<section class="section page--post page--post-new">
        <div class="section__body page-article__wrap">
			<?
			$ElementID = $APPLICATION->IncludeComponent(
			"bitrix:news.detail",
			"blog-detail",
			[
				"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
				"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
				"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
				"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
				"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
				"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"META_KEYWORDS" => $arParams["META_KEYWORDS"],
				"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
				"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
				"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
				"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
				"SET_TITLE" => $arParams["SET_TITLE"],
				"MESSAGE_404" => $arParams["MESSAGE_404"],
				"SET_STATUS_404" => $arParams["SET_STATUS_404"],
				"SHOW_404" => $arParams["SHOW_404"],
				"FILE_404" => $arParams["FILE_404"],
				"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
				"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
				"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
				"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
				"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
				"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
				"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
				"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
				"CHECK_DATES" => $arParams["CHECK_DATES"],
				"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
				"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
				"USE_SHARE" => $arParams["USE_SHARE"],
				"SHARE_HIDE" => $arParams["SHARE_HIDE"],
				"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
				"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
				"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
				"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
				"ADD_ELEMENT_CHAIN" => $arParams["ADD_ELEMENT_CHAIN"],
				'STRICT_SECTION_CHECK' => $arParams['STRICT_SECTION_CHECK'],
				'BACK_URL' => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
			],
			$component,
			['HIDE_ICONS' => 'Y']
		);?>

            <aside class="page-article__aside">
					
					<?

						//
						// echo "<pre>"; print_r($arResult); echo "</pre>";
						$code = $arResult["VARIABLES"]["ELEMENT_CODE"];
						$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => 10, "CODE" => $code));
						while($ob = $res->GetNextElement())
						{
							$arFields = $ob->GetFields();
							$arProps = $ob->GetProperties();
						}
						// echo "<pre>"; print_r($arProps["OTHER_ARTICLE"]); echo "</pre>";
						if($arProps["OTHER_ARTICLE"]["VALUE"] && count($arProps["OTHER_ARTICLE"]["VALUE"]) > 0) {
							// привязанные статьи
							$GLOBALS['arrFilter'] = array('ID' => $arProps["OTHER_ARTICLE"]["VALUE"]);
						} else {
							// выбираем из последних 50 статей 3 случайных
							$elmId = $arFields["ID"];
							$res = CIBlockElement::GetList(Array("ID" => "DESC"), Array("IBLOCK_ID" => 10, "!=ID" => $elmId), false, Array("nTopCount"=>50), array("ID"));
							$arId = [];
							while($ob = $res->GetNextElement())
							{
								$arFields = $ob->GetFields();
								$arId[] = $arFields["ID"];
							}
							// 3 случайных id-ка
							$randId = array_rand(array_flip($arId), 3);
							// echo "<pre>"; print_r($randId); echo "</pre>";
							$GLOBALS['arrFilter'] = array('ID' => $randId);
						}


					?>

					<?
					$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"blog-list-other",
					[
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"NEWS_COUNT" => 3,
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
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
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
						"FILTER_NAME" => 'arrFilter',
						"USE_FILTER" => "Y",
					],
					$component,
					['HIDE_ICONS' => 'Y']
				);?>



				<?/*
                <div class="promotions promotions--sticky-position">
                    <a class="promotions__link" href="" target="_blank">Выгодные предложения и акции</a>

                    <ul class="promotions__list">
                        <li class="promotions__item">
                            <div class="promotions__item-img">
                                <img src="/local/templates/delement/frontend/assets/images/post/promotion.jpg" width="146" height="140" alt="">
                            </div>
                            <a class="promotions__item-link" href="">Круглый год! Установка и год обслуживания SSL-сертификат в подарок</a>
                        </li>

                        <li class="promotions__item">
                            <div class="promotions__item-img">
                                <img src="/local/templates/delement/frontend/assets/images/post/promotion.jpg" width="146" height="140" alt="">
                            </div>
                            <a class="promotions__item-link" href="">Круглый год! Установка и год обслуживания SSL-сертификат в подарок</a>
                        </li>

                        <li class="promotions__item">
                            <div class="promotions__item-img">
                                <img src="/local/templates/delement/frontend/assets/images/post/promotion.jpg" width="146" height="140" alt="">
                            </div>
                            <a class="promotions__item-link" href="">Круглый год! Установка и год обслуживания SSL-сертификат в подарок</a>
                        </li>
                    </ul>
                </div>
				*/?>
            </aside>

        </div>

    </section>


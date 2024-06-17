<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>


<div class="topics">
	Читайте также
	<div class="topics__content">

		<div class="topics__tab">

			<ul class="topics__tab-list">
				<?foreach($arResult["ITEMS"] as $arItem):?>

					<?$time = $arItem["ACTIVE_FROM"];

					if($arItem["PROPERTIES"]["TIME"]["VALUE"]) {
						$time = $arItem["PROPERTIES"]["TIME"]["VALUE"];
					}

					$dateFull = FormatDate("d.M.Y", MakeTimeStamp($time));?>
				<li class="topics__tab-item">
					<div class="topics__tab-item-top">
						<?if($arItem["PROPERTIES"]["HASHTAGS"]["VALUE"]) {?>
						<span class="link"><?=$arItem["PROPERTIES"]["HASHTAGS"]["VALUE"][0];?></span>
						<?}?>
						<time><?=$dateFull;?></time>
					</div>

					<a class="topics__tab-item-title only-2-lines" href="<?=$arItem["DETAIL_PAGE_URL"]?>" target="_blank"><?=$arItem["NAME"];?></a>
				</li>
				<?endforeach;?>
			</ul>

			<a class="link-with-arrow" href="/blog/" target="_blank">Все статьи</a>
		</div>

	</div>
</div>

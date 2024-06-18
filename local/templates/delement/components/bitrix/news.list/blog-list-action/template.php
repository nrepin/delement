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

<?if(!empty($arResult["ITEMS"])) {?>
	<div class="promotions promotions--sticky-position">
		<span class="promotions__link">Выгодные предложения и акции</span>

		<ul class="promotions__list">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<li class="promotions__item">
					<?
					if(is_array($arItem["PREVIEW_PICTURE"])) {?>
						<div class="promotions__item-img">
							<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"];?>" width="146" height="140" alt="">
						</div>
					<?}?>
					<span class="promotions__item-link"><?=$arItem["NAME"];?></span>
				</li>
			<?endforeach;?>
		</ul>
	</div>
<?}?>



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
$this->setFrameMode(true);?>

<form class="form page-blog__form"  action="<?=$arResult["FORM_ACTION"]?>">
	<div class="form-row">
		<input class="form-input" type="search" name="q" placeholder="Поиск статей" />
		<button class="btn" type="submit">
			<span class="visually-hidden">Найти</span>
			<svg class="i-icon btn__icon">
				<use href="#icon-search-2"></use>
			</svg>
		</button>
	</div>
</form>



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

use CFile;

$this->setFrameMode(true);
?>

<?
	// функция склонения сколько минут на чтение 
	function num_word($value, $words, $show = true) 
	{
		$num = $value % 100;
		if ($num > 19) { 
			$num = $num % 10; 
		}
		
		$out = ($show) ?  $value . ' ' : '';
		switch ($num) {
			case 1:  $out .= $words[0]; break;
			case 2: 
			case 3: 
			case 4:  $out .= $words[1]; break;
			default: $out .= $words[2]; break;
		}
		
		return $out;
	}

	// время публикации
	$time = $arResult["ACTIVE_FROM"];

	if($arResult["PROPERTIES"]["TIME"]["VALUE"]) {
		$time = $arResult["PROPERTIES"]["TIME"]["VALUE"];
	}
	$dateShort = FormatDate("Y-m-d", MakeTimeStamp($time));
	$dateFull = FormatDate("d.M.Y", MakeTimeStamp($time));

	// кол-во просмотров статьи

	if($arResult["PROPERTIES"]["CUSTOM_VIEW"]["VALUE"]) {
		$showCounter = $arResult["PROPERTIES"]["CUSTOM_VIEW"]["VALUE"]; 
	} else {
		$showCounter = $arResult["SHOW_COUNTER"];
	}

	// автор статьи 

	if($arResult["PROPERTIES"]["AUTHOR"]["VALUE"]) {
		$author = $arResult["PROPERTIES"]["AUTHOR"]["VALUE"];
	} else {
		$author = preg_replace("~\(.*\)~", "", $arResult["CREATED_USER_NAME"]);
	}

	// Галерея
	if($arResult["PROPERTIES"]["GALLERY"]["VALUE"] && is_array($arResult["PROPERTIES"]["GALLERY"]["VALUE"])) {
		$arSRC = [];
		foreach($arResult["PROPERTIES"]["GALLERY"]["VALUE"] as $item) {
			$arSRC[] = CFile::GetPath($item);
		}
		$arResult["PROPERTIES"]["GALLERY"]["SRC"] = $arSRC;
	}

?>
<? //echo "<pre>"; print_r($arResult["PROPERTIES"]["GALLERY"]); echo "</pre>";?>

<article class="post-layout tile user-free-content">

	<div class="post-layout__wrap">
		<header class="post-layout__header article-summary">

			<? if ($arResult["PROPERTIES"]["HASHTAGS"]["VALUE"]) {?>
				<ul class="post-layout__header-item article-summary__hashtag-list">
					<?foreach($arResult["PROPERTIES"]["HASHTAGS"]["VALUE"] as $item) {?>
						<li class="article-summary__hashtag-item">
							<span class="article-summary__hashtag-link"><?=$item;?></span>
						</li>
					<?}?>
				</ul>
			<?}?>
			<div class="article-summary__post-info">
				<span class="article-summary__author">
					<?=$author;?>
				</span>
				<time datetime="<?=$dateShort;?>" class="post-layout__header-item post-layout__time article-summary__info-text">
					<?=$dateFull;?>
				</time>
			</div>
			<? if ($arResult["PROPERTIES"]["READ_TIME"]["VALUE"]) {?>
				<span class="post-layout__header-item post-layout__time-to-read article-summary__info-text">
					<? echo num_word($arResult["PROPERTIES"]["READ_TIME"]["VALUE"], array('минута', 'минуты', 'минут'));?> на чтение
				</span>
			<?}?>
			<div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
				<?=$showCounter;?>
				<span class="article-summary__info-icon article-summary__info-icon--eye">
					<svg width="22" height="22">
						<use href="#icon-eye-3"></use>
					</svg>
				</span>
			</div>
		</header>

		<div class="post-layout__content">


			<h2><?=$arResult["NAME"]?></h2>

			<?echo $arResult["DETAIL_TEXT"];?>

			<?if(isset($arResult["PROPERTIES"]["GALLERY"]["SRC"]) && count($arResult["PROPERTIES"]["GALLERY"]["SRC"]) > 0) {?>
			<div class="post-layout__slider blog-gallery">
				<div class="swiper-container">

					<div class="swiper-wrapper" data-js-gallery-container>
						<?foreach($arResult["PROPERTIES"]["GALLERY"]["SRC"] as $src) {?>
							<div class="swiper-slide">
								<img src="<?=$src?>" alt="" class="blog-gallery__img" data-js-zoom>
							</div>
						<?}?>


						<!-- <div class="swiper-slide">
							<img src="/local/templates/delement/frontend/assets/images/post/demo1.png" alt="" class="blog-gallery__img" data-js-zoom>
						</div>

						<div class="swiper-slide">
							<img src="/local/templates/delement/frontend/assets/images/post/demo1.png" alt="" class="blog-gallery__img" data-js-zoom>
						</div>

						<div class="swiper-slide">
							<img src="/local/templates/delement/frontend/assets/images/post/demo1.png" alt="" class="blog-gallery__img" data-js-zoom>
						</div>

						<div class="swiper-slide">
							<img src="/local/templates/delement/frontend/assets/images/post/demo1.png" alt="" class="blog-gallery__img" data-js-zoom>
						</div>

						<div class="swiper-slide">
							<img src="/local/templates/delement/frontend/assets/images/post/demo1.png" alt="" class="blog-gallery__img" data-js-zoom>
						</div> -->
					</div>

					<div class="blog-gallery__navigation">
						<button class="blog-gallery__btn blog-gallery__btn--prev slider-btn-rounded-blue">
							<svg width="13" height="16" class="i-icon">
								<use xlink:href="#icon-arrow--left"></use>
							</svg>
						</button>
						<button class="blog-gallery__btn blog-gallery__btn--next slider-btn-rounded-blue">
							<svg width="13" height="16" class="i-icon">
								<use xlink:href="#icon-arrow--right"></use>
							</svg>
						</button>
					</div>

					<div class="blog-gallery__pagination"></div>

				</div>
			</div>
			<?}?>
		</div>
		<footer class="post-layout__footer">
			<div class="blog-bottom">
				<div class="blog-bottom__aux">
					<a href="<?=$arParams["BACK_URL"]?>" class="back-list-article link-with-arrow link-with-arrow--back">Вернуться к списку статей</a></p>
				</div>
			</div>
		</footer>

	</div>
</article>

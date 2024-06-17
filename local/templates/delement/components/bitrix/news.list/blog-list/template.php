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

<div class=" page-blog__cards 11">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?$detailText = $arItem["DETAIL_TEXT"]; 
		$countWord = isset($arParams["COUNT_WORDS"]) ? intval($arParams["COUNT_WORDS"]) : 15;
		$detailTextWords = implode(' ', array_slice(explode(' ', $detailText), 0, $countWord));
		?>
		<article class="card-post card-post--new card-post--full ">
			<?$picture = "/local/templates/delement/frontend/assets/images/2.png";
		
			if(is_array($arItem["PREVIEW_PICTURE"])) {
				$picture = $arItem["PREVIEW_PICTURE"]["SRC"];
			}?>
			
			<?if($picture) {?>
				<div class="card-post__img">
					<img src="<?=$picture;?>" alt="<?echo $arItem["NAME"]?>">
				</div>
			<?}?>
			<div class="card-post__info ">

				<?if($arItem["PROPERTIES"]["HASHTAGS"]["VALUE"]) {?>
					<div class="card-post__summary article-summary">
						<ul class="article-summary__hashtag-list">
							<li class="article-summary__hashtag-item">
								<span class="article-summary__hashtag-link"><?=$arItem["PROPERTIES"]["HASHTAGS"]["VALUE"][0];?></span>
							</li>
						</ul>
					</div>
				<?}?>
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="card-post__link">
					<h3 class="card-post__title"><?echo $arItem["NAME"]?></h3>
				</a>
				<?if($arItem["PREVIEW_TEXT"]) {?>
					<div class="card-post__preview-text">
						<p>
							<?echo $arItem["PREVIEW_TEXT"];?>
						</p>
					</div>
				<?} else {?>
					<div class="card-post__preview-text">
						<?echo $detailTextWords;?>
					</div>	
				<?}?>

				<div class="card-post__bottom article-summary">
					<div class="article-summary__info-block">
						<?if($arItem["PROPERTIES"]["AUTHOR"]["VALUE"]) {?>
							<span class="article-summary__author">
								<?=$arItem["PROPERTIES"]["AUTHOR"]["VALUE"];?>
							</span>
						<?} else {?>
							<span class="article-summary__author">
								<?=preg_replace("~\(.*\)~", "", $arItem["CREATED_USER_NAME"]);?>
							</span>
						<?}?>

						<?
						$time = $arItem["ACTIVE_FROM"];

						if($arItem["PROPERTIES"]["TIME"]["VALUE"]) {
							$time = $arItem["PROPERTIES"]["TIME"]["VALUE"];
						}

						$dateShort = FormatDate("Y-m-d", MakeTimeStamp($time));
						$dateFull = FormatDate("d.M.Y", MakeTimeStamp($time));
						?>
						<time datetime="<?=$dateShort;?>" class="article-summary__info-text">
							<?=$dateFull;?>
						</time>
					</div>

					<?if($arItem["PROPERTIES"]["CUSTOM_VIEW"]["VALUE"]) {
						$showCounter = $arItem["PROPERTIES"]["CUSTOM_VIEW"]["VALUE"]; 
					} else {
						$showCounter = $arItem["SHOW_COUNTER"];
					}?>

					<div class="pull-right article-summary__info-text article-summary__info-text--with-icon">
						<? if ($showCounter) {
							echo $showCounter;
						} else {
							echo '1';
						}?>
						<span class="article-summary__info-icon article-summary__info-icon--eye">
							<svg width="22" height="22" data-js-origin-id="icon-eye-3" class="icon-eye-3" viewBox="0 0 24 18">	
								<path d="M1 8.79167L0.0726012 8.41759C-0.0242004 8.65758 -0.0242004 8.92575 0.0726012 9.16574L1 8.79167ZM23 8.79167L23.9274 9.16575C24.0242 8.92575 24.0242 8.65758 23.9274 8.41759L23 8.79167ZM12 15.5833C8.44012 15.5833 5.93972 13.8287 4.29406 12.0154C3.47032 11.1078 2.87289 10.1969 2.48208 9.51298C2.28723 9.17199 2.1453 8.89016 2.05353 8.69712C2.00769 8.60068 1.97448 8.52665 1.95355 8.47876C1.94309 8.45482 1.93571 8.43744 1.93136 8.42708C1.92919 8.4219 1.92778 8.41848 1.92712 8.41688C1.92679 8.41608 1.92665 8.41574 1.92669 8.41585C1.92672 8.41591 1.92679 8.41608 1.92691 8.41637C1.92696 8.41652 1.92709 8.41682 1.92712 8.41689C1.92725 8.41723 1.9274 8.41759 1 8.79167C0.0726012 9.16574 0.0727719 9.16616 0.0729548 9.16662C0.0730319 9.16681 0.0732276 9.16729 0.0733822 9.16767C0.0736917 9.16844 0.0740503 9.16932 0.0744583 9.17032C0.0752742 9.17232 0.0762874 9.1748 0.0774986 9.17774C0.0799208 9.18363 0.0831356 9.19139 0.0871493 9.20095C0.0951759 9.22008 0.106402 9.24645 0.120879 9.27958C0.149825 9.34583 0.191811 9.43919 0.247248 9.55581C0.358046 9.78888 0.52303 10.1158 0.745591 10.5053C1.1896 11.2823 1.86895 12.3193 2.81306 13.3596C4.7031 15.4421 7.70269 17.5833 12 17.5833V15.5833ZM1 8.79167C1.9274 9.16574 1.92725 9.1661 1.92712 9.16644C1.92709 9.16651 1.92696 9.16682 1.92691 9.16696C1.92679 9.16725 1.92672 9.16742 1.92669 9.16748C1.92665 9.1676 1.92679 9.16725 1.92712 9.16645C1.92778 9.16485 1.92919 9.16143 1.93136 9.15625C1.93571 9.14589 1.94309 9.12851 1.95355 9.10457C1.97448 9.05668 2.00769 8.98265 2.05353 8.88621C2.1453 8.69317 2.28723 8.41134 2.48208 8.07036C2.87289 7.38643 3.47032 6.47553 4.29406 5.56789C5.93972 3.75461 8.44012 2 12 2V0C7.70269 0 4.7031 2.14123 2.81306 4.22378C1.86895 5.26405 1.1896 6.30107 0.745591 7.07808C0.52303 7.46757 0.358046 7.79446 0.247248 8.02753C0.191811 8.14414 0.149825 8.23751 0.120879 8.30375C0.106402 8.33688 0.0951759 8.36325 0.0871493 8.38238C0.0831356 8.39194 0.0799208 8.3997 0.0774986 8.40559C0.0762874 8.40853 0.0752742 8.41101 0.0744583 8.41301C0.0740503 8.41401 0.0736917 8.4149 0.0733822 8.41566C0.0732276 8.41604 0.0730319 8.41653 0.0729548 8.41672C0.0727719 8.41717 0.0726012 8.41759 1 8.79167ZM12 2C15.5598 2 18.0602 3.75461 19.7059 5.56789C20.5297 6.47553 21.1271 7.38644 21.5179 8.07036C21.7128 8.41134 21.8547 8.69318 21.9465 8.88621C21.9923 8.98265 22.0255 9.05669 22.0465 9.10458C22.0569 9.12852 22.0643 9.1459 22.0686 9.15626C22.0708 9.16143 22.0722 9.16485 22.0729 9.16645C22.0732 9.16726 22.0734 9.1676 22.0733 9.16749C22.0733 9.16743 22.0732 9.16726 22.0731 9.16697C22.073 9.16682 22.0729 9.16652 22.0729 9.16644C22.0727 9.16611 22.0726 9.16575 23 8.79167C23.9274 8.41759 23.9272 8.41716 23.927 8.41671C23.927 8.41652 23.9268 8.41604 23.9266 8.41566C23.9263 8.41489 23.9259 8.41401 23.9255 8.41301C23.9247 8.41101 23.9237 8.40853 23.9225 8.40558C23.9201 8.39969 23.9169 8.39194 23.9128 8.38237C23.9048 8.36325 23.8936 8.33687 23.8791 8.30375C23.8502 8.2375 23.8082 8.14414 23.7527 8.02752C23.6419 7.79445 23.477 7.46756 23.2544 7.07808C22.8104 6.30106 22.131 5.26405 21.1869 4.22378C19.2969 2.14123 16.2973 0 12 0V2ZM23 8.79167C22.0726 8.41759 22.0727 8.41722 22.0729 8.41689C22.0729 8.41682 22.073 8.41651 22.0731 8.41637C22.0732 8.41608 22.0733 8.4159 22.0733 8.41585C22.0734 8.41573 22.0732 8.41608 22.0729 8.41688C22.0722 8.41848 22.0708 8.4219 22.0686 8.42708C22.0643 8.43743 22.0569 8.45482 22.0465 8.47875C22.0255 8.52665 21.9923 8.60068 21.9465 8.69712C21.8547 8.89015 21.7128 9.17199 21.5179 9.51297C21.1271 10.1969 20.5297 11.1078 19.7059 12.0154C18.0602 13.8287 15.5598 15.5833 12 15.5833V17.5833C16.2973 17.5833 19.2969 15.4421 21.1869 13.3596C22.131 12.3193 22.8104 11.2823 23.2544 10.5053C23.477 10.1158 23.6419 9.78888 23.7527 9.55581C23.8082 9.4392 23.8502 9.34583 23.8791 9.27959C23.8936 9.24646 23.9048 9.22009 23.9128 9.20096C23.9169 9.19139 23.9201 9.18364 23.9225 9.17775C23.9237 9.17481 23.9247 9.17233 23.9255 9.17032C23.9259 9.16932 23.9263 9.16844 23.9266 9.16768C23.9268 9.1673 23.927 9.16681 23.927 9.16662C23.9272 9.16617 23.9274 9.16575 23 8.79167ZM12 10.9083C10.8086 10.9083 9.85714 9.9528 9.85714 8.79167H7.85714C7.85714 11.0731 9.71987 12.9083 12 12.9083V10.9083ZM14.1429 8.79167C14.1429 9.9528 13.1914 10.9083 12 10.9083V12.9083C14.2801 12.9083 16.1429 11.0731 16.1429 8.79167H14.1429ZM12 6.675C13.1914 6.675 14.1429 7.63054 14.1429 8.79167H16.1429C16.1429 6.51022 14.2801 4.675 12 4.675V6.675ZM12 4.675C9.71987 4.675 7.85714 6.51022 7.85714 8.79167H9.85714C9.85714 7.63054 10.8086 6.675 12 6.675V4.675Z" fill="#71747D"></path>
							</svg>
						</span>
					</div>
				</div>
			</div>
		</article>
	<?endforeach;?>
</div>

<div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>

<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>
<?=$arResult["FORM_NOTE"]?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>
	<input type="hidden" name="form_hidden_12" value="<?=$arParams["EMAIL_TO"]?>" />

<div class="form-row">
	<div class="form-col">
		<label for="input-subject">Выберите интересующие вас услуги</label>
			<ul class="tabs-cloud">
			<?foreach($arResult["QUESTIONS"]["SERVICE"]["STRUCTURE"] as $item) {?>
				<li class="tabs-cloud__item">
					<input type="checkbox" class="tabs__input" id="<?=$item["ID"]?>" name="form_checkbox_SERVICE[]" value="<?=$item["ID"]?>"/>
					<label class="tag" for="<?=$item["ID"]?>"><?=$item["MESSAGE"]?></label> 
				</li>
			<?}?>
		</ul>
	</div>
</div>



<div class="form-row">
	<div class="form-col">
		<label for="input-budget">Бюджет</label>
		<ul class="tabs-cloud">
			<?foreach($arResult["QUESTIONS"]["budget"]["STRUCTURE"] as $key => $item) {?>
				<li class="tabs-cloud__item">
					<input type="radio"  class="tabs__input" id="<?=$item["ID"]?>" name="form_radio_budget" 
						<?=($key === 0) ? " checked " : ""?>
						value="<?=$item["ID"]?>"
					/>
					<label class="tag" for="<?=$item["ID"]?>"><?=$item["MESSAGE"]?>	</label>
				</li>
			<?}?>
		</ul>
	</div>
</div>




<div class="form-row">
	<div class="form-col">
		<label for="input-name">Ваше имя</label>
		<input placeholder="Ваше имя" name="form_text_1" id="input-name" type="text" class="form-input" data-input-required>
	</div>

	<div class="form-col">
		<label for="input-phone">Контактный телефон</label>
		<input placeholder="+7 (___) ___ ____" id="input-phone" type="text" class="form-input inputmask" name="form_text_2" required data-input-required="phone">
	</div>
</div>

<div class="form-row">
	<div class="form-col">
		<label for="input-email">Эл. почта</label>
		<input placeholder="Эл. почта" id="input-email" name="form_text_3" type="email" class="form-input inputmask">
	</div>

	<div class="form-col">
		<label for="attachment" class="file-holder">
			<button data-input-file--btn  class="file-holder__btn" type="button">
				<svg>
					<use href="#icon-attach"></use>
				</svg>
				<svg>
					<use href="#icon-gallery-close"></use>
				</svg>
			</button>
			<span data-input-file--pseudo id="attachment-info" data-css-default-value="Прикрепить файл" class="file-holder__input"></span>
			<input data-input-file autocomplete="off" type="file" name="form_file_4" class="file-holder__file" id="attachment" />
		</label>
	</div>
</div>

<div class="form-row">
	<div class="form-col">
		<label for="input-message">Комментарий к заказу</label>
		<textarea placeholder="Комментарий к заказу" id="input-message" class="form-input" name="form_text_11"></textarea>
	</div>
</div>

<div class="form-row">
	<div class="form-col">
		<div class="form-note">
			<div class="form-note__icon">
				<svg class="i-icon">
					<use xlink:href="#icon-info"></use>
				</svg>
			</div>
			<div class="form-note__text">Заполните все поля и опишите вашу задачу как можно подробнее</div>
		</div>

		<label class="checkbox" for="pers">
			<input id="pers" class="checkbox__input" type="checkbox" value="Y" name="pers" tabindex="-1" required data-input-required="checkbox" checked>
			<span class="checkbox__emulator">
				<svg class="checkbox__icon i-icon">
				<use xlink:href="#icon-mark"></use>
				</svg>
			</span>
			<span class="checkbox__label">
				Согласен на обработку <a href="#">персональных данных</a>
			</span>
		</label>
	</div>
	<div class="form-col">
		<input type="submit" class="btn btn--large btn--blue hvr-radial-out" name="web_form_submit" value="Заказать услугу"></input>
	</div>
</div>

<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
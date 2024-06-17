<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

 define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");
 AddMessage2Log($arParams, "template.php arParams=");				
 AddMessage2Log($arResult, "template.php arResult=");				

?>
<div class="mfeedback">
	<?if(!empty($arResult["ERROR_MESSAGE"])) {
		foreach($arResult["ERROR_MESSAGE"] as $v)
			ShowError($v);
	}
	if($arResult["OK_MESSAGE"] <> '') {?>
		<?if(!empty($arResult["CHECK"]) && ($arResult["CHECK"] === "on")) {?>
			<?$email = $arResult["AUTHOR_EMAIL"];?>
			<?if(strlen($email) > 0) {?>
				<?$mess = $arResult["OK_MESSAGE"]." Отчет отправлен на email ".$email?>
			<?} else {?>
				<?$mess = $arResult["OK_MESSAGE"]." email не задан, отчет не отправлен на почту "?>
			<?}?>
		<?} else {?>
			<?$mess = $arResult["OK_MESSAGE"]?>
		<?}?>
		<div class="mf-ok-text"><?=$mess?></div>
	<?}?>

	<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
		<?=bitrix_sessid_post()?>

		<div class="mf-send">
			<div class="mf-text">
				<?=GetMessage("REPORT_CHECKBOX")?>
			</div>
			<input type="checkbox" name="send_email" <?=$arResult["CHECK"] === "on" ? "checked" : ""?>>
		</div>

		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<input type="submit" name="submit" value="<?=GetMessage("REPORT_SUBMIT")?>">
		<?if($arResult["LINK"]) {?>
			<a href="<?=$arResult["LINK"]?>" download>Ссылка для скачивания отчета</a>
		<?}?>
	</form>
</div>
<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();


/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use Bitrix\Main,
	Bitrix\Main\Loader,
	Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

if (!\Bitrix\Main\Loader::includeModule('iblock'))
{
	ShowError(Loc::getMessage('REPORT_IBLOCK_MODULE_NOT_INSTALLED'));
	return;
}

$arResult["PARAMS_HASH"] = md5(serialize($arParams).$this->GetTemplateName());

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
if($arParams["IBLOCK_TYPE"] == '')
	$arParams["IBLOCK_TYPE"] = "service";

$arParams["IBLOCK_CODE"] = trim($arParams["IBLOCK_CODE"]);
if($arParams["IBLOCK_CODE"] == '')
	$arParams["IBLOCK_CODE"] = "auth";
	

if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"]))
{
	$arResult["ERROR_MESSAGE"] = array();
	if(check_bitrix_sessid())
	{

		$res = CIBlock::GetList(Array(), Array('TYPE'=>$arParams["IBLOCK_TYPE"], 'SITE_ID'=>SITE_ID, 'ACTIVE'=>'Y', "CODE"=>$arParams["IBLOCK_CODE"]));
		while($ar_res = $res->Fetch()) {
			$iblockID = $ar_res['ID'];
		}
		if(empty($iblockID)) {
			$arResult["ERROR_MESSAGE"][] = GetMessage("REPORT_NO_IBLOCK_ID");
		}

		if(empty($arResult["ERROR_MESSAGE"]))
		{

			function add_space($s, $width) { // для форматирования строки отчета
				if(mb_strlen($s) > $width) return $s;
				while(mb_strlen($s) < $width) {
					$s = $s . " ";
				}
				return $s;
			}

			$out = "";
			$res = \CIBlockElement::GetList(array("ID" => "ASC"), 
				array(
					"IBLOCK_ID" => $iblockID,
					"PROPERTY_USER" => $USER->GetID(),
				), false, false, array("IBLOCK_ID", "ID", "NAME", "PROPERTY_*"));
			while ($ob = $res->GetNextElement()) {
				$arFields = $ob->GetFields();
				$arProps = $ob->GetProperties();

				$out .= "| ".add_space($arFields["NAME"], 20)." | ";

				if($arProps["USER"]["VALUE"]) {
					$user = $arProps["USER"]["VALUE"]." - ".$USER->GetFormattedName(false);
					$out .= add_space($user, 40)." | ";
				} else {
					$out .= add_space("", 40)." | ";
				}

				$out .= add_space(trim($arProps["STATUS"]["VALUE"]), 15)." | ";

				$out .= add_space(trim($arProps["ERROR"]["VALUE"]), 80)." | ";

				$out .= PHP_EOL;
			}

			// создали файл и добавили в bitrix
			$filename = uniqid();
			$filenameFull = $filename.".txt";
			$fileId = CFile::SaveFile([
				"name" => $filenameFull,
				"content" => $out,
				"MODULE_ID" => "report",
			], "report/".$USER->GetID());

			if($_POST["send_email"] === "on") {
				// отправили по почте, если установлен checkbox
				$email = htmlspecialcharsbx($USER->GetEmail());
				if(strlen($email) > 0) {
					$arFields = Array(
						"EMAIL_TO" => $email,
					);
					CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "", "", [$fileId]);
				}

				LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"]."&file=".$fileId."&check=".$_POST["send_email"], Array("success", "file", "check")));
			} else {
				LocalRedirect($APPLICATION->GetCurPageParam("success=".$arResult["PARAMS_HASH"]."&file=".$fileId, Array("success", "file")));
			}
		}
	}
	else
		$arResult["ERROR_MESSAGE"][] = GetMessage("REPORT_SESS_EXP");
}
elseif($_REQUEST["success"] == $arResult["PARAMS_HASH"])
{
	$arResult["OK_MESSAGE"] = GetMessage("REPORT_OK_TEXT");
	$fid = htmlspecialcharsbx($_REQUEST["file"]);
	$arResult["LINK"] = CFile::GetPath($fid);
	$arResult["CHECK"] = htmlspecialcharsbx($_REQUEST["check"]);
}

if(empty($arResult["ERROR_MESSAGE"]))
{
	if($USER->IsAuthorized())
	{
		$arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
		$arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($USER->GetEmail());
	}
}

$this->IncludeComponentTemplate();

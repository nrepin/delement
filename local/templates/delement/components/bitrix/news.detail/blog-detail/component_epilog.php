<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$title = $arResult["NAME"];
if(strlen($title) < 30) {
	// время публикации
	$time = $arResult["IBLOCK"]["TIMESTAMP_X"];
	$dateFull = FormatDate("d.M.Y", MakeTimeStamp($time));
	// автор статьи 
    $author = $arResult["AUTHOR"];

    $title = $title." - ".$author." - ".$dateFull;
}

$APPLICATION->SetTitle($title);


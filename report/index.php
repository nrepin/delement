<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Отчет");
?>

<?$APPLICATION->IncludeComponent("repin:main.reports","",Array(
        "IBLOCK_CODE" => "auth",
        "IBLOCK_TYPE" => "services",
		"EVENT_NAME" => "REPORT_AUTH",
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
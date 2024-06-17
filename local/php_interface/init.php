<?
use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime;
use CUser;

Loader::includeModule('iblock');


AddEventHandler("main", "OnAfterUserLogin", "OnAfterUserLoginHandler");

function OnAfterUserLoginHandler(&$fields) {

    $dt = new DateTime();
    if($fields['USER_ID']<=0) {
        $dataAdd = [
            "IBLOCK_ID" => 11,
            "NAME" => FormatDate("Y-m-d H:i:s",MakeTimeStamp($dt)),
            "PROPERTY_VALUES"=> [
                "STATUS" => "ошибка",
                "TIME" => $dt,
                "ERROR" => "Логин-". $fields["LOGIN"] . " Пароль-". $fields["PASSWORD"] . " Ошибка: " . $fields["RESULT_MESSAGE"]["MESSAGE"],
            ],
        ];
        $dbRes = CUser::GetByLogin($fields["LOGIN"]);
        while ($res = $dbRes->Fetch()) {
            $dataAdd["PROPERTY_VALUES"]["USER"] = $res["ID"];
        }
    } else {
        $dataAdd = [
            "IBLOCK_ID" => 11,
            "NAME" => FormatDate("Y-m-d H:i:s",MakeTimeStamp($dt)),
            "PROPERTY_VALUES"=> [
                "STATUS" => "успех",
                "USER" => $fields['USER_ID'],
                "TIME" => $dt,
                "ERROR" => "",
            ],
        ];
    }


    $el = new \CIBlockElement;
    if($id = $el->Add($dataAdd)) {
        //
    }

}

// 404
AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
   if(
      !defined('ADMIN_SECTION') &&
      defined("ERROR_404")
     ){
      global $APPLICATION;
      $APPLICATION->RestartBuffer();
      CHTTP::SetStatus("404 страница не найдена");
      include($_SERVER["DOCUMENT_ROOT"]."/404.php");
   }
}
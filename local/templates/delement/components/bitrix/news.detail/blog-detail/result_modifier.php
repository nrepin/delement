<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (is_object($this->__component)) { 
    $this->__component->SetResultCacheKeys(array('AUTHOR')); 
	$arResult['AUTHOR'] = $this->__component->arResult['PROPERTIES']['AUTHOR']['VALUE']; 
}

<?if(!check_bitrix_sessid()) return;?>
<?
UnRegisterModuleDependences("iblock", "OnIBlockPropertyBuildList", 
"lxkvlv.ibprop", "CIBlockPropertyYesno", "GetIBlockPropertyDescription");

UnRegisterModule("lxkvlv.ibprop");

echo CAdminMessage::ShowNote(GetMessage("MOD_UNINST_OK"));
?>
<?if(!check_bitrix_sessid()) return;?>
<?

RegisterModule("lxkvlv.ibprop");

RegisterModuleDependences(
"iblock", "OnIBlockPropertyBuildList",
"lxkvlv.ibprop", "CIBlockPropertyYesno", "GetIBlockPropertyDescription"
);
echo CAdminMessage::ShowNote(GetMessage("MOD_INST_OK"));
?>
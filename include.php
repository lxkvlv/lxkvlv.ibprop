<?
IncludeModuleLangFile(__FILE__);

class CIBlockPropertyYesno extends CUserTypeInteger
{
	// инициализация пользовательского свойства для инфоблока
	function GetIBlockPropertyDescription()
	{
		return 
			array(
				'PROPERTY_TYPE' => 'N',
				'USER_TYPE' => 'yesno',
				'DESCRIPTION' => GetMessage('DESCRIPTION'),
				'ConvertToDB' => array('CIBlockPropertyYesno', 'ConvertToDB'),
				'GetPropertyFieldHtml' => array('CIBlockPropertyYesno', 'GetPropertyFieldHtml'),
				'GetAdminListViewHTML' => array('CIBlockPropertyYesno', 'GetAdminListViewHTML'),
			);
	}

	//в базе храниться как 1/0
	function ConvertToDB($arProperty, $value)
	{
		if(!$value["VALUE"]) {

			$value["VALUE"] = 0;

		}

		return $value;
		
	}

	//редактирование свойства
	//своя
	function getEditHTML($id, $name, $value)
	{
		$checked = ($value) ? 'checked' : '' ;

		return '<label for="yesno'.$id.'">'.GetMessage('YES').' </label><input id="yesno'.$id.'" type="checkbox" name="'.$name.'" value="1" '.$checked.'>';

	}

	//отображение свойства
	//своя
	function getViewHTML($name, $value)
	{
		if ($value) {

			return GetMessage('YES');

		} else {

			return GetMessage('NO');

		}
	}

    /**
	 * Метод должен вернуть безопасный HTML отображения значения свойства в списке элементов административной части.
	 * https://dev.1c-bitrix.ru/api_help/iblock/classes/user_properties/GetAdminListViewHTML.php
	 * @param array $arProperty Метаданные свойства.
	 * @param array $value Значение свойства.
	 * @param array $strHTMLControlName Имена элементов управления для заполнения значения свойства и его описания.
	 * @return str Строка.
	 * @static
	 */
	function GetAdminListViewHTML($arProperty, $value, $strHTMLControlName)
	{	

		return self::getViewHTML($strHTMLControlName['VALUE'], $value['VALUE']);

	}

    /**
	 * Метод должен вернуть HTML отображения элемента управления для редактирования значений свойства в административной части.
	 * https://dev.1c-bitrix.ru/api_help/iblock/classes/user_properties/GetPropertyFieldHtml.php
	 * @param array $arProperty Метаданные свойства.
	 * @param array $value Значение свойства.
	 * @param array $strHTMLControlName Имена элементов управления для заполнения значения свойства и его описания.
	 * @return str Строка.
	 * @static
	 */
	function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
	{	
		
		if ($strHTMLControlName['MODE'] == 'FORM_FILL'||$strHTMLControlName['MODE'] == 'iblock_element_admin') {

			return self::getEditHTML($arProperty['ID'], $strHTMLControlName['VALUE'], $value['VALUE']);
		
		} else {

			return self::getViewHTML($strHTMLControlName['VALUE'], $value['VALUE']);

		}
	}

}
?>
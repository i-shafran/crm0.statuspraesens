<?php
namespace App\Http\Models\Import;

use App\Http\Controllers\Controller;
use App\Http\Models\vtiger_crmentity;
use App\Http\Models\Contacts\vtiger_contactaddress;
use App\Http\Models\Contacts\vtiger_contactdetails;
use App\Http\Models\Contacts\vtiger_contactscf;
use App\Http\Models\Contacts\vtiger_contactsubdetails;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class csv_import {
	
	public static $row_name;
	public static $row_value;

	/**
	 * Поиск записи в базе
	 * @param Controller $controller - Контроллер
	 * @param $merge_fields - Массив для поиска в базу
	 * @return mixed
	 */
	public static function find_row(Controller $controller, $merge_fields)
	{
		$find_row = new vtiger_crmentity();
		foreach($controller->relation_clasess as $relation_class){
			$class_name = substr(strrchr($relation_class, "\\"), 1);
			foreach($merge_fields as $key => $value){
				$model_class = new $relation_class;
				if(in_array($key, $model_class::$fields)){
					static::$row_name = $key;
					static::$row_value = $value;
					$find_row = $find_row->whereHas($class_name, function($qwery)
					{
						$qwery->where(static::$row_name, "=", static::$row_value);

					});
				}
			}
		}
		$result = $find_row->where("deleted", "!=", 1);
		
		return $result;
	}

	/**
	 * Сохранение строки в базу
	 * @param Controller $controller
	 * @param $arInsert - Массив для вставки в базу
	 * @param $setype - значение поля setype
	 */
	public static function save_row(Controller $controller, $arInsert, $setype)
	{
		$contact = new vtiger_crmentity();

		$contact["smcreatorid"] = 1;
		$contact["smownerid"] = 1;
		$contact["modifiedby"] = 1;
		$contact["setype"] = $setype;
		$contact["createdtime"] = Carbon::now()->format("Y-m-d H:i:s");
		$contact["modifiedtime"] = Carbon::now()->format("Y-m-d H:i:s");
		$contact["label"] = $arInsert["firstname"]." ".$arInsert["lastname"];

		$contact->save();

		$id = $contact->crmid;

		DB::update('UPDATE vtiger_crmentity_seq SET id = ?', array($id));

		foreach($controller->relation_clasess as $relation_class){
			$model_class = new $relation_class;
			$primary_key = $model_class->getKeyName();
			$model_class->$primary_key = $id;
			
			foreach($arInsert as $key => $value){
				if($value == ""){
					// Пустые значения пропускаем
					continue;
				}
				if(in_array($key, $relation_class::$fields)){
					$model_class->$key = $value;
				}
			}

			$model_class->save();
		}
	}
	
	/**
	 * Модификация массива с данными для вставки в соответствии с ТЗ
	 * @param $arInsert - массива с данными
	 * @param vtiger_crmentity $contact - Объект контакта в базе
	 * @return mixed
	 */
	public static function update_arInsert($arInsert, vtiger_crmentity $contact)
	{
		//  Массив полей CRM
		$arCrmField = array();
		$contact->load("vtiger_contactdetails", "vtiger_contactscf", "vtiger_contactsubdetails", "vtiger_contactaddress");
		foreach($contact->getAttributes() as $key => $value){
			$arCrmField[$key] = $value;
		}
		foreach($contact->vtiger_contactdetails->getAttributes() as $key => $value){
			$arCrmField[$key] = $value;
		}
		foreach($contact->vtiger_contactscf->getAttributes() as $key => $value){
			$arCrmField[$key] = $value;
		}
		foreach($contact->vtiger_contactsubdetails->getAttributes() as $key => $value){
			$arCrmField[$key] = $value;
		}
		foreach($contact->vtiger_contactaddress->getAttributes() as $key => $value){
			$arCrmField[$key] = $value;
		}

		/*
		 * п. 1
		 * Рабочий тел., Мобильный тел., Доп. телефон 1, Доп. телефон 2, Другой тел.
		 * Сравниваются только цифры (все остальные символы при сравнении система не учитывает),
		 * например: 8 (926) 777 77 77 при сравнении выглядит как 89267777777.
		 * В случае, если номер телефона содержит в себе 10 цифр, то при сравнении система дописывает перед ними "8"		
		*/
		$arPhones = array(
			"phone" => "Рабочий тел.",
			"mobile" => "Мобильный тел.",
			"cf_948" => "Доп. телефон 1",
			"cf_949" => "Доп. телефон 2",
			"otherphone" => "Другой тел."
		);
		
		foreach($arPhones as $key => $value){
			if(isset($arInsert[$key]) and !empty($arCrmField[$key])){
				// сравнение по цифрам
				$pattern = "#[^0-9]+#iu";
				$insert = preg_replace($pattern, '', $arInsert[$key]);
				// В случае, если номер телефона содержит в себе 10 цифр,
				// то при сравнении система дописывает перед ними "8"
				if(iconv_strlen($insert) == 10){
					$insert = "8".$insert;
				}

				$arBase = array(); // Значения из базы
				$i = 0;
				foreach($arPhones as $key2 => $value2){
					$arBase[$i] = preg_replace($pattern, '', $arCrmField[$key2]);
					if(iconv_strlen($arBase[$i]) == 10){
						$arBase[$i] = "8".$arBase[$i];
					}

					$i++;
				}
								
				if(in_array($insert, $arBase)){
					$arInsert[$key] = "";
				}
			}
		}
		
		/*
		 * п. 2
		 * Удалить все пробелы из полей Email
		*/
		if(isset($arInsert["email"]))
			$arInsert["email"] = str_replace(" ", "", $arInsert["email"]);
		if(isset($arInsert["secondaryemail"]))
			$arInsert["secondaryemail"] = str_replace(" ", "", $arInsert["secondaryemail"]);
		if(isset($arInsert["cf_947"]))
			$arInsert["cf_947"] = str_replace(" ", "", $arInsert["cf_947"]);

		/*
		 * п. 3
		 * Поля, обновляющиеся с переносом данных в другое аналогичное поле
		 * Специальность, Адрес E-mail, Рабочий тел., Мобильный тел.
		 * Специальность 2, Второй Email, Доп. телефон 1, Другой тел.
		 * Специальность 3, E-mail 3, Доп. телефон 2
		 * 
		 * Система должна сравнить импортируемое значение с каждым из значений в соответствующем поле.
		 * Если оно не совпадает ни с одним из них, происходит запись в первое свободное поле.
		 * В случае, если все поля заполнены, система переписывает значение в первом поле новым,
		 * старые переносит в поля по порядку, значение из последнего поля стирается
		 * (поле 1 -> поле 2; поле 2 -> поле 3; поле 3 -> стирается)
		*/
		$arField1 = array("cf_730", "email", "phone", "mobile");
		$arField2 = array("cf_744", "secondaryemail", "cf_948", "otherphone");
		$arField3 = array("cf_839", "cf_947", "cf_949");

		$arDataField1 = array(
			"cf_730" => $arCrmField["cf_730"],
			"email" => $arCrmField["email"],
			"phone" => $arCrmField["phone"],
			"mobile" => $arCrmField["mobile"]
		);
		$arDataField2 = array(
			"cf_744" => $arCrmField["cf_744"],
			"secondaryemail" => $arCrmField["secondaryemail"],
			"cf_948" => $arCrmField["cf_948"],
			"otherphone" => $arCrmField["otherphone"]
		);
		$arDataField3 = array(
			"cf_839" => $arCrmField["cf_839"],
			"cf_947" => $arCrmField["cf_947"],
			"cf_949" => $arCrmField["cf_949"]
		);
				
		// Проход по основным
		foreach($arField1 as $key => $value){
			if(isset($arInsert[$value]) and !empty($arInsert[$value])){
				if($key < 3 and $arInsert[$value] != $arDataField1[$arField1[$key]] and $arInsert[$value] != $arDataField2[$arField2[$key]] and $arInsert[$value] != $arDataField3[$arField3[$key]]){
					if(empty($arDataField1[$arField1[$key]])){
						$arDataField1[$arField1[$key]] = $arInsert[$value];
					}
					elseif(empty($arDataField2[$arField2[$key]])){
						$arDataField2[$arField2[$key]] = $arInsert[$value];
					}
					elseif(empty($arDataField3[$arField3[$key]])){
						$arDataField3[$arField3[$key]] = $arInsert[$value];
					} else {
						$arDataField3[$arField3[$key]] = $arCrmField[$arField2[$key]];
						$arDataField2[$arField2[$key]] = $arCrmField[$value];
						$arDataField1[$arField1[$key]] = $arInsert[$value];
					}
				}
				elseif($key == 3 and $arInsert[$value] != $arDataField1[$arField1[$key]] and $arInsert[$value] != $arDataField2[$arField2[$key]]){
					if(empty($arDataField1[$arField1[$key]])){
						$arDataField1[$arField1[$key]] = $arInsert[$value];
					}
					elseif(empty($arDataField3[$arField2[$key]])){
						$arDataField2[$arField2[$key]] = $arInsert[$value];
					} else {
						$arDataField2[$arField2[$key]] = $arCrmField[$value];
						$arDataField1[$arField1[$key]] = $arInsert[$value];
					}
				}
			}
		}
		
		// Проход по вторичным
		foreach($arField2 as $key => $value){
			if(isset($arInsert[$value]) and !empty($arInsert[$value])){
				if($key < 3 and $arInsert[$value] != $arDataField1[$arField1[$key]] and $arInsert[$value] != $arDataField2[$arField2[$key]] and $arInsert[$value] != $arDataField3[$arField3[$key]]){
					if(empty($arDataField1[$arField1[$key]])){
						$arDataField1[$arField1[$key]] = $arInsert[$value];
					}
					elseif(empty($arDataField2[$arField2[$key]])){
						$arDataField2[$arField2[$key]] = $arInsert[$value];
					}
					elseif(empty($arDataField3[$arField3[$key]])){
						$arDataField3[$arField3[$key]] = $arInsert[$value];
					} else {
						$arDataField3[$arField3[$key]] = $arCrmField[$arField2[$key]];
						$arDataField2[$arField2[$key]] = $arInsert[$value];
					}
				}
				elseif($key == 3 and $arInsert[$value] != $arDataField1[$arField1[$key]] and $arInsert[$value] != $arDataField2[$arField2[$key]]){
					if(empty($arDataField1[$arField1[$key]])){
						$arDataField1[$arField1[$key]] = $arInsert[$value];
					}
				}
			}
		}
		
		// Проход по третьим
		foreach($arField3 as $key => $value){
			if(isset($arInsert[$value]) and !empty($arInsert[$value])){
				if($key < 3 and $arInsert[$value] != $arDataField1[$arField1[$key]] and $arInsert[$value] != $arDataField2[$arField2[$key]] and $arInsert[$value] != $arDataField3[$arField3[$key]]){
					if(empty($arDataField1[$arField1[$key]])){
						$arDataField1[$arField1[$key]] = $arInsert[$value];
					}
					elseif(empty($arDataField2[$arField2[$key]])){
						$arDataField2[$arField2[$key]] = $arInsert[$value];
					} else {
						$arDataField3[$arField3[$key]] = $arInsert[$value];
					}
				}
			}
		}
		
		// Вставка в массив $arInsert
		foreach($arDataField1 as $key => $value){
			$arInsert[$key] = $value;
		}
		foreach($arDataField2 as $key => $value){
			$arInsert[$key] = $value;
		}
		foreach($arDataField3 as $key => $value){
			$arInsert[$key] = $value;
		}
		

		/*
		* п. 4
		* 		
		Импортируемые поля:
		1 Индекс, 2 Улица, 3 Дом, 4 Корпус/Строение, 5 Кв/Офис, 6 Город,
		7 Район, 8 Область, 9 Страна, 10 Абонентский ящик, 11 Адрес, 12 Куда
		Поля для переноса старых данных:
		1 Доп.адрес: индекс, 2 Доп.адрес: улица, 3 ДопДом, 4 ДопКорпус/Строение,
		5 ДопКв/Офис, 6 Доп.адрес: город, 7 Доп.адрес: район, 8 Доп.адрес: область,
		9 Доп.адрес: страна, 10 Другой а/я, 11 Доп.Адрес, 12 Доп.адрес Куда
		 
		4.1 Если есть дом и город в CSV и в базе, перезапись полей с переносом, неуказанные поля обнуляются
		4.1.1 Если есть дом и город в CSV, а в базе есть индекс и абонентский ящик, перезапись полей с переносом, неуказанные поля обнуляются
		4.1.2 Если есть дом и город в CSV, а в базе есть Адрес, перезапись полей с переносом, неуказанные поля обнуляются
		4.2 Если есть индекс и абонентский ящик в CSV и в базе, перезапись полей с переносом, неуказанные поля обнуляются
		4.2.1 Если есть индекс и абонентский ящик в CSV, а в базе есть дом и город, перезапись полей с переносом, неуказанные поля обнуляются
		4.2.2 Если есть индекс и абонентский ящик в CSV, а в базе адрес, перезапись полей с переносом, неуказанные поля обнуляются
		4.3 Если есть дом и город только в CSV - перезапись без переноса, неуказанные поля обнуляются
		4.4 Если есть индекс и абонентский ящик только в CSV перезапись без переноса, неуказанные поля обнуляются
		4.5 Если в базе (нет дома или города) И (нет индекса или абонентского ящика) И (нет адреса), а в CSV есть город или область или страна - перезапись данных (только область, город и страна), неуказанные поля обнуляются
		4.5.1 Если в базе (нет дома или города) И (нет индекса или абонентского ящика) И (нет адреса) И (нет города или страны или области) - все поля обнуляются
		4.6 Если в CSV нет дома или города, а в базе есть дом и город, поля не трогаем
		4.6.1 Если в CSV нет дома или города, а в базе есть индекс и абонентский ящик, поля не трогаем
		4.6.2 Если в CSV нет дома или города, а в базе есть адрес, поля не трогаем
		4.7 Если в CSV нет индекса или абонентского ящика, а в базе есть индекс и абонентский ящик, поля не трогаем
		4.7.1 Если в CSV нет индекса или абонентского ящика, а в базе есть дом и город, поля не трогаем
		4.7.2 Если в CSV нет индекса или абонентского ящика, а в базе есть адрес, поля не трогаем		 * 
		*/
		$arField4 = array(
			"mailingzip", "mailingstreet", "cf_751", "cf_752", "cf_753",
			"mailingcity", "cf_790", "mailingstate", "mailingcountry", "mailingpobox",
			"cf_724", "cf_802"
		);
		$arField5 = array(
			"otherzip", "otherstreet", "cf_756", "cf_754", "cf_755",
			"othercity", "cf_952", "otherstate", "othercountry", "otherpobox",
			"cf_725", "cf_950"
		);
		
		// 4.0.5 Если есть дом и город в CSV и они совпадают со значениями в базе (дом и город) или (доп. дом и доп. город)), совмещаем данные с тем блоком, в котором совпадают (основной или доп.)
		if((!empty($arInsert["cf_751"]) and !empty($arInsert["mailingcity"]))
			and
				($arInsert["cf_751"] == $arCrmField["cf_751"] and $arInsert["mailingcity"] == $arCrmField["mailingcity"])
		)
		{
			// Ниче не делаем, все по дефолту
		}
		elseif((!empty($arInsert["cf_751"]) and !empty($arInsert["mailingcity"]))
			and
			($arInsert["cf_751"] == $arCrmField["cf_756"] and $arInsert["mailingcity"] == $arCrmField["othercity"])
		)
		{
			foreach($arField4 as $key => $value){
				if(isset($arInsert[$value])){
					$arInsert[$arField5[$key]] = $arInsert[$value];
					$arInsert[$value] = "";
				}
			}
		}
		
		// 4.0.6 Если есть индекс и абонентский ящик в CSV и они совпадают со значениями в базе ((индекс и абонентский ящик) или (доп. индекс и доп. Абонентский ящик)), совмещаем данные с тем блоком, в котором совпадают (основной или доп.)
		elseif((!empty($arInsert["mailingzip"]) and !empty($arInsert["mailingpobox"]))
			and
			($arInsert["mailingzip"] == $arCrmField["mailingzip"] and $arInsert["mailingpobox"] == $arCrmField["mailingpobox"])
		)
		{
			// Ниче не делаем, все по дефолту
		}
		elseif((!empty($arInsert["mailingzip"]) and !empty($arInsert["mailingpobox"]))
			and
			($arInsert["mailingzip"] == $arCrmField["otherzip"] and $arInsert["mailingpobox"] == $arCrmField["otherpobox"])
		)
		{
			foreach($arField4 as $key => $value){
				if(isset($arInsert[$value])){
					$arInsert[$arField5[$key]] = $arInsert[$value];
					$arInsert[$value] = "";
				}
			}
		}

		// 4.1
		elseif(!empty($arInsert["cf_751"]) and !empty($arInsert["mailingcity"])
			and !empty($arCrmField["cf_751"]) and !empty($arCrmField["mailingcity"]))
		{
			foreach($arField4 as $key => $value){
				if(!empty($arCrmField[$value])){
					$arInsert[$arField5[$key]] = $arCrmField[$value];
				}
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}
		// 4.1.1
		elseif(!empty($arInsert["cf_751"]) and !empty($arInsert["mailingcity"])
				and !empty($arCrmField["mailingzip"]) and !empty($arCrmField["mailingpobox"]))
		{
			foreach($arField4 as $key => $value){
				if(!empty($arCrmField[$value])){
					$arInsert[$arField5[$key]] = $arCrmField[$value];
				}
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}
		// 4.1.2
		elseif(!empty($arInsert["cf_751"]) and !empty($arInsert["mailingcity"])
				and !empty($arCrmField["cf_724"]))
		{
			foreach($arField4 as $key => $value){
				if(!empty($arCrmField[$value])){
					$arInsert[$arField5[$key]] = $arCrmField[$value];
				}
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}		
		// 4.2
		elseif(!empty($arInsert["mailingzip"]) and !empty($arInsert["mailingpobox"])
				and !empty($arCrmField["mailingzip"]) and !empty($arCrmField["mailingpobox"]))
		{
			foreach($arField4 as $key => $value){
				if(!empty($arCrmField[$value])){
					$arInsert[$arField5[$key]] = $arCrmField[$value];
				}
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}
		// 4.2.1
		elseif(!empty($arInsert["mailingzip"]) and !empty($arInsert["mailingpobox"])
				and !empty($arCrmField["cf_751"]) and !empty($arCrmField["mailingcity"]))
		{
			foreach($arField4 as $key => $value){
				if(!empty($arCrmField[$value])){
					$arInsert[$arField5[$key]] = $arCrmField[$value];
				}
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}
		// 4.2.2
		elseif(!empty($arInsert["mailingzip"]) and !empty($arInsert["mailingpobox"])
				and !empty($arCrmField["cf_724"]))
		{
			foreach($arField4 as $key => $value){
				if(!empty($arCrmField[$value])){
					$arInsert[$arField5[$key]] = $arCrmField[$value];
				}
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}
		// 4.3
		elseif(!empty($arInsert["cf_751"]) and !empty($arInsert["mailingcity"])){
			foreach($arField4 as $key => $value){
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}
		// 4.4
		elseif(!empty($arInsert["mailingzip"]) and !empty($arInsert["mailingpobox"])){
			foreach($arField4 as $key => $value){
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
			}
		}
		// 4.5
		elseif(
			((empty($arCrmField["cf_751"]) or empty($arCrmField["mailingcity"]))
			and (empty($arCrmField["mailingzip"]) or empty($arCrmField["mailingpobox"]))
			and empty($arCrmField["cf_724"]))
			and
			(!empty($arInsert["mailingcity"]) or !empty($arInsert["mailingstate"]) or !empty($arInsert["mailingcountry"]))
		)
		{
			foreach($arField4 as $key => $value){
				if(empty($arInsert[$value])){
					$arInsert[$value] = "del"; // Метка удаления
				}
				// перезапись данных (только область, город и страна)
				if($value != "mailingcity" and $value != "mailingstate" and $value != "mailingcountry"){
					$arInsert[$value] = "";
				}
			}
		}
		// 4.5.1
		elseif(
			((empty($arCrmField["cf_751"]) or empty($arCrmField["mailingcity"]))
				and (empty($arCrmField["mailingzip"]) or empty($arCrmField["mailingpobox"]))
				and empty($arCrmField["cf_724"]))
			and
			(empty($arCrmField["mailingcity"]) or empty($arCrmField["mailingstate"]) or empty($arCrmField["mailingcountry"]))
		)
		{
			// Удаление данных
			foreach($arField4 as $key => $value){
				$arInsert[$value] = "del"; // Метка удаления
			}
		}
		// 4.6
		elseif(
			(empty($arInsert["cf_751"]) or empty($arInsert["mailingcity"]))
			and
			(!empty($arCrmField["cf_751"]) and !empty($arCrmField["mailingcity"]))
		)
		{
			foreach($arField4 as $key => $value){
				unset($arInsert[$value]);
			}
		}
		// 4.6.1
		elseif(
			(empty($arInsert["cf_751"]) or empty($arInsert["mailingcity"]))
			and
			(!empty($arCrmField["mailingzip"]) and !empty($arCrmField["mailingpobox"]))
		)
		{
			foreach($arField4 as $key => $value){
				unset($arInsert[$value]);
			}
		}
		// 4.6.2
		elseif(
			(empty($arInsert["cf_751"]) or empty($arInsert["mailingcity"]))
			and
			!empty($arCrmField["cf_724"])
		)
		{
			foreach($arField4 as $key => $value){
				unset($arInsert[$value]);
			}
		}
		// 4.7
		elseif(
			(empty($arInsert["mailingzip"]) or empty($arInsert["mailingpobox"]))
			and
			(!empty($arCrmField["mailingzip"]) and !empty($arCrmField["mailingpobox"]))
		)
		{
			foreach($arField4 as $key => $value){
				unset($arInsert[$value]);
			}
		}
		// 4.7.1
		elseif(
			(empty($arInsert["mailingzip"]) or empty($arInsert["mailingpobox"]))
			and
			(!empty($arCrmField["cf_751"]) and !empty($arCrmField["mailingcity"]))
		)
		{
			foreach($arField4 as $key => $value){
				unset($arInsert[$value]);
			}
		}
		// 4.7.2
		elseif(
			(empty($arInsert["mailingzip"]) or empty($arInsert["mailingpobox"]))
			and
			!empty($arCrmField["cf_724"])
		)
		{
			foreach($arField4 as $key => $value){
				unset($arInsert[$value]);
			}
		}



		return $arInsert;
	}
}
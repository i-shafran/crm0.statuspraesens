<?php namespace App\Http\Controllers;

use App\Http\Models\Import\csv_import;
use App\Http\Models\Import\process;
use App\Http\Models\vtiger_crmentity;
use App\Http\Models\Contacts\vtiger_contactaddress;
use App\Http\Models\Contacts\vtiger_contactdetails;
use App\Http\Models\Contacts\vtiger_contactscf;
use App\Http\Models\Contacts\vtiger_contactsubdetails;
use App\Http\Requests;

use Carbon\Carbon;
use DebugBar\DebugBar;
use Illuminate\View\View;
use Symfony\Component\Debug\Debug;

class ContactsController extends Controller {
	
	public $csv_path = "";
	
	public $relation_clasess = array(
		"App\\Http\\Models\\Contacts\\vtiger_contactdetails",
		"App\\Http\\Models\\Contacts\\vtiger_contactaddress",
		"App\\Http\\Models\\Contacts\\vtiger_contactsubdetails",
		"App\\Http\\Models\\Contacts\\vtiger_contactscf"
	);
	
	public function __construct()
	{
		$this->middleware("auth");
		$this->csv_path = env('CSV_PATH')."/IMPORT_1";
	}

	public function index()
	{	
		return "Contacts";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $id
	 * @param Requests\Contacts $request
	 * @return \Illuminate\Support\Collection|null|static
	 */
	public function edit($id, Requests\Contacts $request)
	{
		if (!$request->ajax())
		{
			return "not ajax";
		}
		
		// Реляция таблиц
		$crmentity = vtiger_crmentity::find($id);
		$vtiger_contactdetails = $crmentity->vtiger_contactdetails;
		$vtiger_contactaddress = $crmentity->vtiger_contactaddress;
		$vtiger_contactscf = $crmentity->vtiger_contactscf;
		$vtiger_contactsubdetails = $crmentity->vtiger_contactsubdetails;

		// Присваивание полей из $request полям в таблицах
		$request = $request->all();
		if(isset($request["data"])){
			$request = $request["data"];
		} else {
			return response()->json(array("error" => "No data"));
		}

		foreach($request as $key => $value){
			if(in_array($key, vtiger_contactdetails::$fields)){
				$vtiger_contactdetails->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_contactaddress::$fields)){
				$vtiger_contactaddress->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_contactscf::$fields)){
				$vtiger_contactscf->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_contactsubdetails::$fields)){
				$vtiger_contactsubdetails->$key = $value;
				continue;
			}
		}

		// Сохрание
		$vtiger_contactdetails->save();
		$vtiger_contactaddress->save();
		$vtiger_contactscf->save();
		$vtiger_contactsubdetails->save();

		return response()->json(array("mess" => "Ok"));
	}
	
	// Парсинг CSV файла и импорт в базу данных
	public function csv_import(Requests\Contacts $request)
	{
		$post = $request->all();
		$process = new process();

		$csv_string_count = 0; // Колличество строк в файле
		$import_type = ""; // Тип импорта 1 - Пропустить, 2 - Перезаписать, 3 - Совместить
		$merge_fields = array(); // Сопоставление по полям
		$field_mapping = array(); // Соответствие полей в базе, полям в файле
		$row_count = 0; // Колличество новых вставленных записей
		$row_update_count = 0; // Колличество обновленных записей
		$arDublicatCSV = array(); // Массив записей, которые были уже прочитаны. Поиск дубликатов в CSV.
				
		if($post["file_encoding"] != "CP1251"){
			$process->status = "Ошибка кодировки (Code 1)";
			$process->stop = 1;
			$process->save();
			return array("status" => $process->status);
		}		
		if(!is_file($this->csv_path)){
			$process->status = "Файл CSV по адресу ".$this->csv_path." не найден (Code 2)";
			$process->stop = 1;
			$process->save();
			return array("status" => $process->status);
		}
		if($post["module"] != "Contacts"){
			$process->status = "Не модуль Контакты (Code 3)";
			$process->stop = 1;
			$process->save();
			return array("status" => $process->status);
		}

		$import_type = (int) $post["merge_type"];
		$merge_fields = json_decode($post["merge_fields"]);
		$field_mapping = (array) json_decode($post["field_mapping"]);
		if(empty($merge_fields) or empty($field_mapping) or empty($import_type)){
			$process->status = "Переданы пустые массивы (Code 4)";
			$process->stop = 1;
			$process->save();
			return array("status" => $process->status);
		}
		foreach($field_mapping as $key => $value){
			$field_mapping[$value] = $key;
			unset($field_mapping[$key]);
		}
		foreach($merge_fields as $key => $value){
			$merge_fields[$value] = $value;
			unset($merge_fields[$key]);
		}

		$csv_string_count = file($this->csv_path);
		$csv_string_count = count($csv_string_count);
		$csv_string_count = $csv_string_count - 1;

		$process->status = "Идет импорт...";
		$process->csv_string_count = $csv_string_count;
		$process->save();

		// Чтение CSV
		$row = 0; // Номер строки CSV
		if (($handle = fopen($this->csv_path, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 5000, ";")) !== FALSE)
			{
				// Проверка статуса остановки
				$process = process::find($process->id);
				if($process->stop == 1){
					$process->status = "Импорт был принудительно завершен (Code 5)";
					$process->save();
					break;
				}
				
				if($row == 0){ // Чтение со второй строки
					$row++;
					continue;
				}
				$i = 0;
				$arInsert = array(); // Массив для записи в базу
				foreach($data as $value){
					$value = iconv('CP1251', 'UTF-8',$value);
					$value = trim(strip_tags($value));
					
					if(array_key_exists($i, $field_mapping)){
						// fix crm salutationtype
						if($field_mapping[$i] == "salutationtype"){
							$field_mapping[$i] = "salutation";
						}
						$arInsert[$field_mapping[$i]] = $value;
					}						
					$i++;
				}
				
				if(!isset($arInsert["firstname"]) or !isset($arInsert["lastname"])){
					$process->status = "Не указаны обязательные поля для импорта (Имя или Фамилия) в строке $i (Code 6)";
					$process->stop = 1;
					$process->save();
					return array("status" => $process->status);
				}
				
				foreach($merge_fields as $key => $value){
					$merge_fields[$key] = $arInsert[$key];
				}
				
				$insert_string = implode(" ", $merge_fields); // Собранная строка поиска

				// Проверить есть ли такая запись в базе $merge_fields
				// Если найдено 2 и более записей в базе, прервать цикл, вывести ошибку
				// Если такая запись уже была ранее в цикле, прервать цикл, вывести ошибку

				// Дубликаты CSV
				if($key = array_search($insert_string, $arDublicatCSV)){
					$process->status = "
						Найден дубликат записи в файле CSV '$insert_string'.
						Первое упоминание записи на строке ".($key + 2).".
						Импорт остановлен на строке ".($row + 1).".
						Необходимо удалить дубликат из файла для продолжения импорта, или выбрать другие критерии поиска.
					";
					$process->stop = 1;
					$process->save();
					return array("status" => $process->status);
				} else {
					$arDublicatCSV[] = $insert_string;
				}

				$find_row = csv_import::find_row($this, $merge_fields);

				// Выявлено дублирование в базе
				if($find_row->get()->count() > 1){
					$process->status = "
						Выявлено дублирование в базе записи '$insert_string'.
						Остановка обработки на строке ".($row + 1).".
						Необходимо удалить дубликат из базы, или выбрать другие критерии поиска.
					";
					$process->stop = 1;
					$process->save();
					return array("status" => $process->status);
				}


				// Запись в базу данных
				switch ($import_type) {
					// Пропустить
					case 1:
						// Если запись не найдена, вставка записи, иначе пропустить
						if(!is_object($find_row->first())){
									
							csv_import::save_row($this, $arInsert, "Contacts");

							$row_count++;
						} else {
							continue;
						}
						
						break;
					//  Перезаписать
					case 2:						
						// Если нет, добавить
						if(!is_object($find_row->first())){

							csv_import::save_row($this, $arInsert, "Contacts");

							$row_count++;
						} else { // Если такая запись есть, удалить все значения полей, добавить новые
							$arRow = $find_row->first()->toArray();
							$contact = vtiger_crmentity::find($arRow["crmid"]);
							
							foreach($this->relation_clasess as $relation_class){
								$class_name = substr(strrchr($relation_class, "\\"), 1);
								$contact->load($class_name);

								$model_class = new $relation_class;
								foreach($model_class::$fields as $field){
									if(array_key_exists($field, $arInsert)){
										$contact->$class_name->$field = $arInsert[$field];
									} else {
										$ddd = $model_class->guarded;
										if(!in_array($field, $model_class->guarded)){
											$contact->$class_name->$field = "";
										}										
									}
								}
							}

							$contact["modifiedtime"] = Carbon::now()->format("Y-m-d H:i:s");
							$contact["label"] = $arInsert["firstname"]." ".$arInsert["lastname"];

							$contact->push();

							$row_update_count++;
						}


						break;
					// Совместить
					case 3:
						// Если нет, добавить
						if(!is_object($find_row->first())){

							csv_import::save_row($this, $arInsert, "Contacts");

							$row_count++;
						} else { // Если такая запись есть, изменить значения на значения цикла
							$arRow = $find_row->first()->toArray();
							$contact = vtiger_crmentity::find($arRow["crmid"]);

							// Модификация массива с данными для вставки в соответствии с ТЗ
							$arInsert = csv_import::update_arInsert($arInsert, $contact);

							foreach($this->relation_clasess as $relation_class){
								$class_name = substr(strrchr($relation_class, "\\"), 1);
								$contact->load($class_name);

								$model_class = new $relation_class;
								foreach($model_class::$fields as $field){
									if(array_key_exists($field, $arInsert) and !empty($arInsert[$field])){
										if($arInsert[$field] == "del"){
											$contact->$class_name->$field = ""; // Очистить
										} else {
											$contact->$class_name->$field = $arInsert[$field];
										}										
									} else {
										continue;
									}
								}
							}

							$contact["modifiedtime"] = Carbon::now()->format("Y-m-d H:i:s");
							$contact["label"] = $arInsert["firstname"]." ".$arInsert["lastname"];

							$contact->push();

							$row_update_count++;
						}
						
						
						break;
					default:
						$process->status = "import_type не определен (Code 7)";
						$process->stop = 1;
						$process->save();
						return array("status" => $process->status);
				}

				// Запись статуса
				$process->status = "Идет импорт...";
				$process->insert_count = $row_count;
				$process->update_count = $row_update_count;
				$process->csv_done = $row;
				$process->save();

				$row++;
			}
			fclose($handle);
		}

		if($process->stop != 1){
			$process->status = "Процесс завершен удачно! Вставлено новых записей $row_count. Обновлено записей $row_update_count. Обработано CSV строк ".($row - 1);
			$process->stop = 1;
			$process->save();
		}
		
		return array("status" => $process->status);
	}
	
	// Проверка статуса импорта CSV файла
	public function csv_import_check_process()
	{
		sleep(3); // TODO 5

		$process =  \DB::table('process')->orderBy('id', 'desc')->first();
		$data = array(
			"time_start" => $process->time_start,
			"status" => $process->status,
			"insert_count" => $process->insert_count,
			"update_count" => $process->update_count,
			"csv_done" => $process->csv_done,
			"csv_string_count" => $process->csv_string_count
		);
		
		// Метка STOP process
		if($process->stop == 1){
			$data["stop"] = "stop";
		} else {
			$data["stop"] = "running";
		}
		
		// Время до завершения
		$time_passed = Carbon::now()->timestamp - Carbon::parse($process->time_start)->timestamp;
		if(!$process->csv_done or !$time_passed){
			$time_complete = "Вычисляется...";
		} else {
			$time_complete = $time_passed / $process->csv_done * $process->csv_string_count - $time_passed;
			$time_complete = (int) round($time_complete);
			$time_complete = $this->time($time_complete);
		}
		$data["time_complete"] = $time_complete;

		$html = view("Import.import", $data)->render();
		
		return array("html" => $html, "stop" => $data["stop"]);
	}
	
	// Остановка импорта
	public function stop_process()
	{
		$process_id = \DB::table('process')->orderBy('id', 'desc')->first()->id;
		$process = process::find($process_id);
		$process->stop = 1;
		$process->save();
		
		return array("stop" => "stop");
	}
	
	// Фикс ошибок в базе (ячейка «специфика работы»)
	public function fix_contact()
	{
		$contacts = vtiger_contactscf::whereRaw("cf_837 REGEXP '[0-9]+'")->get();
		
		$i = 0;
		$no_fix = 0;
		foreach($contacts as $contact){
			
			$vtiger_contactdetails = vtiger_contactdetails::find($contact->contactid);
			$phone = $vtiger_contactdetails->phone;
			$phone2 = $contact->cf_948;
			$phone3 = $contact->cf_949;

			if($phone == ""){
				$vtiger_contactdetails->phone = $contact->cf_837;
				$vtiger_contactdetails->save();
				$contact->cf_837 = NULL;
				$contact->fix = 1;
				$contact->save();				
			} elseif($phone2 == ""){
				$contact->cf_948 = $contact->cf_837;
				$contact->cf_837 = NULL;
				$contact->fix = 1;
				$contact->save();
			} elseif ($phone3 == ""){
				$contact->cf_949 = $contact->cf_837;
				$contact->cf_837 = NULL;
				$contact->fix = 1;
				$contact->save();
			} else {
				$no_fix++;
			}
			
			if($i > 1000){
				break;
			}
			$i++;
		}
		
		return array("text" => "Изменено ".($i - $no_fix)."<br>Пропущенно записей ".$no_fix);
	}

	/**
	 * Время из секунд
	 * @param $value - секунды
	 * @return string
	 */
	private function time($value)    {
		$hh = floor($value/3600);
		$min = floor(($value-$hh*3600)/60);
		$sec = $value-$hh*3600-$min*60;
		$l = sprintf('%02d',$hh).':'.sprintf('%02d',$min).':'.sprintf('%02d',$sec);
		return $l;
	}
}

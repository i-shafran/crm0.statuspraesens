<?php namespace App\Http\Controllers;

use App\Http\Models\vtiger_crmentity;
use App\Http\Models\Documents\vtiger_notes;
use App\Http\Models\Documents\vtiger_notescf;
use App\Http\Requests;

use Illuminate\View\View;

class DocumentsController extends Controller {

	public function __construct()
	{
		$this->middleware("auth");
	}

	public function index()
	{
		return "Documents";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $id
	 * @param Requests\Leads $request
	 * @return \Illuminate\Support\Collection|null|static
	 */
	public function edit($id, Requests\Leads $request)
	{
		if (!$request->ajax())
		{
			return "not ajax";
		}

		// Реляция таблиц
		$crmentity = vtiger_crmentity::find($id);
		$vtiger_notes = $crmentity->vtiger_notes;
		$vtiger_notescf = $crmentity->vtiger_notescf;

		// Присваивание полей из $request полям в таблицах
		$request = $request->all();
		if(isset($request["data"])){
			$request = $request["data"];
		} else {
			return response()->json(array("error" => "No data"));
		}

		foreach($request as $key => $value){
			if(in_array($key, vtiger_notes::$fields)){
				$vtiger_notes->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_notescf::$fields)){
				$vtiger_notescf->$key = $value;
				continue;
			}
		}

		// Сохрание
		$vtiger_notes->save();
		if(is_object($vtiger_notescf)){
			$vtiger_notescf->save();
		}		

		return response()->json(array("mess" => "Ok"));
	}

	// Получить html селектов fileLocationType
	public function get_fileLocationType($id)
	{
		$arJson = array();

		$crmentity = vtiger_crmentity::find($id);
		$vtiger_notes = $crmentity->vtiger_notes;
		
		if($vtiger_notes->filelocationtype == "I"){
			$arJson["html"] = "
			<select name='filelocationtype'>
				<option selected value='I'>Внутренний</option>
				<option value='E'>Внешний</option>
			</select>
			";

		} elseif ($vtiger_notes->filelocationtype == "E"){
			$arJson["html"] = "
			<select name='filelocationtype'>
				<option value='I'>Внутренний</option>
				<option selected value='E'>Внешний</option>
			</select>
			";
		} else {
			return response()->json(array("error" => "Тип файла не определен"));
		}		
		$arJson["mess"] = "Ok";

		return response()->json($arJson);
	}

}

<?php namespace App\Http\Controllers;

use App\Http\Models\vtiger_crmentity;
use App\Http\Models\Project\vtiger_project;
use App\Http\Models\Project\vtiger_projectcf;
use App\Http\Requests;

use Illuminate\View\View;

class ProjectController extends Controller {

	public function __construct()
	{
		$this->middleware("auth");
	}

	public function index()
	{
		return "Project";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $id
	 * @param Requests\Project $request
	 * @return \Illuminate\Support\Collection|null|static
	 */
	public function edit($id, Requests\Project $request)
	{
		if (!$request->ajax())
		{
			return "not ajax";
		}

		// Реляция таблиц
		$crmentity = vtiger_crmentity::find($id);
		$vtiger_project = $crmentity->vtiger_project;
		$vtiger_projectcf = $crmentity->vtiger_projectcf;

		// Присваивание полей из $request полям в таблицах
		$request = $request->all();
		if(isset($request["data"])){
			$request = $request["data"];
		} else {
			return response()->json(array("error" => "No data"));
		}

		foreach($request as $key => $value){
			if(in_array($key, vtiger_project::$fields)){
				$vtiger_project->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_projectcf::$fields)){
				$vtiger_projectcf->$key = $value;
				continue;
			}
		}

		// Сохрание
		$vtiger_project->save();
		$vtiger_projectcf->save();

		return response()->json(array("mess" => "Ok"));
	}

}

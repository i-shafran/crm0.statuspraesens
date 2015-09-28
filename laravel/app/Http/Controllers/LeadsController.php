<?php namespace App\Http\Controllers;

use App\Http\Models\vtiger_crmentity;
use App\Http\Models\Leads\vtiger_leadaddress;
use App\Http\Models\Leads\vtiger_leaddetails;
use App\Http\Models\Leads\vtiger_leadscf;
use App\Http\Models\Leads\vtiger_leadsubdetails;
use App\Http\Requests;

use Illuminate\View\View;

class LeadsController extends Controller {

	public function __construct()
	{
		$this->middleware("auth");
	}

	public function index()
	{
		return "Leads";
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
		$vtiger_leaddetails = $crmentity->vtiger_leaddetails;
		$vtiger_leadaddress = $crmentity->vtiger_leadaddress;
		$vtiger_leadscf = $crmentity->vtiger_leadscf;
		$vtiger_leadsubdetails = $crmentity->vtiger_leadsubdetails;

		// Присваивание полей из $request полям в таблицах
		$request = $request->all();
		if(isset($request["data"])){
			$request = $request["data"];
		} else {
			return response()->json(array("error" => "No data"));
		}

		foreach($request as $key => $value){
			if(in_array($key, vtiger_leaddetails::$fields)){
				$vtiger_leaddetails->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_leadaddress::$fields)){
				$vtiger_leadaddress->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_leadscf::$fields)){
				$vtiger_leadscf->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_leadsubdetails::$fields)){
				$vtiger_leadsubdetails->$key = $value;
				continue;
			}
		}

		// Сохрание
		$vtiger_leaddetails->save();
		$vtiger_leadaddress->save();
		$vtiger_leadscf->save();
		$vtiger_leadsubdetails->save();

		return response()->json(array("mess" => "Ok"));
	}

}

<?php namespace App\Http\Controllers;

use App\Http\Models\vtiger_crmentity;
use App\Http\Models\Accounts\vtiger_account;
use App\Http\Models\Accounts\vtiger_accountbillads;
use App\Http\Models\Accounts\vtiger_accountscf;
use App\Http\Models\Accounts\vtiger_accountshipads;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountsController extends Controller {
	
	public function __construct()
	{
		$this->middleware("auth");
	}
	
	public function index()
	{	
		return "Accounts";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $id
	 * @param Requests\Accounts $request
	 * @return \Illuminate\Support\Collection|null|static
	 */
	public function edit($id, Requests\Accounts $request)
	{
		if (!$request->ajax())
		{
			return "not ajax";
		}
		
		// Реляция таблиц
		$crmentity = vtiger_crmentity::find($id);
		$crmentity->load("vtiger_account", "vtiger_accountbillads", "vtiger_accountscf", "vtiger_accountshipads");

		// Присваивание полей из $request полям в таблицах
		$request = $request->all();
		if(isset($request["data"])){
			$request = $request["data"];
		} else {
			return response()->json(array("error" => "No data"));
		}

		foreach($request as $key => $value){
			if(in_array($key, vtiger_account::$fields)){
				$crmentity->vtiger_account->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_accountbillads::$fields)){
				$crmentity->vtiger_accountbillads->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_accountscf::$fields)){
				$crmentity->vtiger_accountscf->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_accountshipads::$fields)){
				$crmentity->vtiger_accountshipads->$key = $value;
				continue;
			}
		}

		// Сохрание
		$crmentity->push();

		return response()->json(array("mess" => "Ok"));
	}

}

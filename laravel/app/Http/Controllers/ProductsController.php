<?php namespace App\Http\Controllers;

use App\Http\Models\vtiger_crmentity;
use App\Http\Models\Products\vtiger_products;
use App\Http\Models\Products\vtiger_productcf;
use App\Http\Requests;

use Illuminate\View\View;

class ProductsController extends Controller {

	public function __construct()
	{
		$this->middleware("auth");
	}

	public function index()
	{
		return "Products";
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param $id
	 * @param Requests\Products $request
	 * @return \Illuminate\Support\Collection|null|static
	 */
	public function edit($id, Requests\Products $request)
	{
		if (!$request->ajax())
		{
			return "not ajax";
		}

		// Реляция таблиц
		$crmentity = vtiger_crmentity::find($id);
		$vtiger_products = $crmentity->vtiger_products;
		$vtiger_productcf = $crmentity->vtiger_productcf;

		// Присваивание полей из $request полям в таблицах
		$request = $request->all();
		if(isset($request["data"])){
			$request = $request["data"];
		} else {
			return response()->json(array("error" => "No data"));
		}

		foreach($request as $key => $value){
			if(in_array($key, vtiger_products::$fields)){
				$vtiger_products->$key = $value;
				continue;
			}
			if(in_array($key, vtiger_productcf::$fields)){
				$vtiger_productcf->$key = $value;
				continue;
			}
		}

		// Сохрание
		$vtiger_products->save();
		$vtiger_productcf->save();

		return response()->json(array("mess" => "Ok"));
	}

}

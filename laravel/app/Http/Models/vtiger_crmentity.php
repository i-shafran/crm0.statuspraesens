<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class vtiger_crmentity extends Model {

	/**
	 * Таблица БД, используемая моделью.
	 *
	 * @var string
	 */
	protected $table = 'vtiger_crmentity';

	public static $fields = array(
		"smcreatorid", "smownerid", "modifiedby", "setype", "description", "createdtime",
		"modifiedtime", "viewedtime", "status", "version", "presence", "deleted",
		"label"
	);

	/**
	 * Атрибуты, исключенные из JSON-представления модели.
	 *
	 * @var array
	 */
	protected $hidden = array();

	/**
	 *  Установка охранных свойств модели
	 *
	 * @var array
	 */
	protected $guarded = array('crmid');

	/** Отключение автоматических полей времени
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'crmid';

	/**
	 * Указание доступных к массовому заполнению атрибутов
	 * @var array
	 */
	protected $fillable = array();

	/**
	 * Таблица vtiger_account
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_account()
	{
		return $this->belongsTo('App\Http\Models\Accounts\vtiger_account', 'crmid');
	}

	/**
	 * Таблица vtiger_accountbillads
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_accountbillads()
	{
		return $this->belongsTo('App\Http\Models\Accounts\vtiger_accountbillads', 'crmid');
	}

	/**
	 * Таблица vtiger_accountscf
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_accountscf()
	{
		return $this->belongsTo('App\Http\Models\Accounts\vtiger_accountscf', 'crmid');
	}

	/**
	 * Таблица vtiger_accountshipads
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_accountshipads()
	{
		return $this->belongsTo('App\Http\Models\Accounts\vtiger_accountshipads', 'crmid');
	}

	/**
	 * Таблица vtiger_contactdetails
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_contactdetails()
	{
		return $this->belongsTo('App\Http\Models\Contacts\vtiger_contactdetails', 'crmid');
	}

	/**
	 * Таблица vtiger_contactaddress
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_contactaddress()
	{
		return $this->belongsTo('App\Http\Models\Contacts\vtiger_contactaddress', 'crmid');
	}

	/**
	 * Таблица vtiger_contactscf
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_contactscf()
	{
		return $this->belongsTo('App\Http\Models\Contacts\vtiger_contactscf', 'crmid');
	}

	/**
	 * Таблица vtiger_contactsubdetails
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_contactsubdetails()
	{
		return $this->belongsTo('App\Http\Models\Contacts\vtiger_contactsubdetails', 'crmid');
	}

	/**
	 * Таблица vtiger_project
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_project()
	{
		return $this->belongsTo('App\Http\Models\Project\vtiger_project', 'crmid');
	}

	/**
	 * Таблица vtiger_projectcf
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_projectcf()
	{
		return $this->belongsTo('App\Http\Models\Project\vtiger_projectcf', 'crmid');
	}

	/**
	 * Таблица vtiger_products
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_products()
	{
		return $this->belongsTo('App\Http\Models\Products\vtiger_products', 'crmid');
	}

	/**
	 * Таблица vtiger_productcf
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_productcf()
	{
		return $this->belongsTo('App\Http\Models\Products\vtiger_productcf', 'crmid');
	}

	/**
	 * Таблица vtiger_leadaddress
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_leadaddress()
	{
		return $this->belongsTo('App\Http\Models\Leads\vtiger_leadaddress', 'crmid');
	}

	/**
	 * Таблица vtiger_leaddetails
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_leaddetails()
	{
		return $this->belongsTo('App\Http\Models\Leads\vtiger_leaddetails', 'crmid');
	}
	
	/**
	 * Таблица vtiger_leadscf
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_leadscf()
	{
		return $this->belongsTo('App\Http\Models\Leads\vtiger_leadscf', 'crmid');
	}

	/**
	 * Таблица vtiger_leadsubdetails
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_leadsubdetails()
	{
		return $this->belongsTo('App\Http\Models\Leads\vtiger_leadsubdetails', 'crmid');
	}

	/**
	 * Таблица vtiger_notes
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_notes()
	{
		return $this->belongsTo('App\Http\Models\Documents\vtiger_notes', 'crmid');
	}

	/**
	 * Таблица vtiger_notescf
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_notescf()
	{
		return $this->belongsTo('App\Http\Models\Documents\vtiger_notescf', 'crmid');
	}


}

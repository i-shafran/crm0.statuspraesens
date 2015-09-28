<?php namespace App\Http\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class vtiger_account extends Model {

	/**
	 * Таблица БД, используемая моделью.
	 *
	 * @var string
	 */
	protected $table = 'vtiger_account';
	
	public static $fields = array(
		"accountname", "phone", "website", "fax", "tickersymbol", "otherphone",
		"employees", "email1", "industry", "email2", "ownership", "emailoptout",
		"siccode", "inn", "notify_owner", "kpp"
	);
	
	// TODO: Для этих полей пока нет соответствий
	public $fields_unknown = array(
		"rating", "account_id_display", "accounttype", "annual_revenue", "assigned_user_id", "description"
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
	protected $guarded = array('id', 'accountid');

	/** Отключение автоматических полей времени
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'accountid';

	/**
	 * Указание доступных к массовому заполнению атрибутов
	 * @var array
	 */
	protected $fillable = array();

	/**
	 * Таблица vtiger_accountbillads
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_accountbillads()
	{
		return $this->belongsTo('App\Http\Models\Accounts\vtiger_accountbillads', 'accountid');
	}

	/**
	 * Таблица vtiger_accountscf
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_accountscf()
	{
		return $this->belongsTo('App\Http\Models\Accounts\vtiger_accountscf', 'accountid');
	}

	/**
	 * Таблица vtiger_accountshipads
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vtiger_accountshipads()
	{
		return $this->belongsTo('App\Http\Models\Accounts\vtiger_accountshipads', 'accountid');
	}



}

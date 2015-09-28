<?php namespace App\Http\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class vtiger_accountbillads extends Model {

	/**
	 * Таблица БД, используемая моделью.
	 *
	 * @var string
	 */
	protected $table = 'vtiger_accountbillads';

	public static $fields = array(
		"bill_city", "bill_code", "bill_country", "bill_state", "bill_street", "bill_pobox"
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
	protected $guarded = array('accountaddressid');

	/** Отключение автоматических полей времени
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'accountaddressid';

	/**
	 * Указание доступных к массовому заполнению атрибутов
	 * @var array
	 */
	protected $fillable = array();


}

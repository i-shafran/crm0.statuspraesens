<?php namespace App\Http\Models\Accounts;

use Illuminate\Database\Eloquent\Model;

class vtiger_accountshipads extends Model {

	/**
	 * Таблица БД, используемая моделью.
	 *
	 * @var string
	 */
	protected $table = 'vtiger_accountshipads';

	public static $fields = array(
		"ship_city", "ship_code", "ship_country", "ship_state", "ship_pobox", "ship_street"
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
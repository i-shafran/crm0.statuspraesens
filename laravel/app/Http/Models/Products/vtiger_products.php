<?php namespace App\Http\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class vtiger_products extends Model {

	/**
	 * Таблица БД, используемая моделью.
	 *
	 * @var string
	 */
	protected $table = 'vtiger_products';

	public static $fields = array();

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
	protected $guarded = array('productid');

	/** Отключение автоматических полей времени
	 * @var bool
	 */
	public $timestamps = false;

	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'productid';

	/**
	 * Указание доступных к массовому заполнению атрибутов
	 * @var array
	 */
	protected $fillable = array();

	public function __construct($attributes = array())
	{
		parent::__construct($attributes); // Eloquent

		// Получение полей, если не заданы
		if(empty(static::$fields)){
			$query = "SHOW COLUMNS FROM $this->table";
			foreach (DB::select($query) as $columns) {
				if(!in_array($columns->Field, $this->guarded)){
					static::$fields[] = $columns->Field;
				}
			}
		}
	}

}

<?
/**
 * Class ajax для ответов на ajax запросы
 */
class ajax
{

	/**
	 * Тип(код) запроса
	 * @var string
	 */
	public $type = "";

	public $error = "";
	public $error_keys = "";
	public $mess = "";
	public $html = "";

	private $request = array();

	function __construct()
	{
		$this->request = $this->clear_data($_REQUEST);

		if(isset($this->request["type"]) and !empty($this->request["type"]))
			$this->type = $this->request["type"];
		else
			return false;

		switch ($this->type){
			case "mass_edit_Accounts": // Модалка "Заказать звонок"
				$this->mass_edit_Accounts();
				break;
			default:
				$this->error = "Не определен тип запроса";
				$this->send_ajax();
				return false;
		}

		return true;
	}

	/**
	 * Массовое редактирование "Контрагенты"
	 * @return bool
	 */
	public function mass_edit_Accounts()
	{
		
		
		if(true){
			$this->mess = "Ok";
			$this->send_ajax();
		} else {
			$this->error = "Обновление не удалось";
			$this->send_ajax();
			return false;
		}


		return true;
	}

	/**
	 * Вывод аякса из параметров
	 * @param array $params - Доп. параметры
	 */
	private function send_ajax($params = array())
	{
		$arJson = array();
		$arJson["mess"] = $this->mess;
		$arJson["error"] = $this->error;
		$arJson["error_keys"] = $this->error_keys;
		if(!empty($this->html)) $arJson["html"] = $this->html;

		// Вывод доп. параметров
		if(!empty($params)){
			foreach ($params as $key => $value){
				$arJson[$key] = $value;
			}
		}

		echo json_encode($arJson);
	}

	/**
	 * Очистка входных данных
	 * @param array $data - Данные для чистки
	 * @return array
	 */
	private function clear_data($data)
	{
		$result = array();
		foreach($data as $key => $value)
		{
			if(is_array($value)){
				$result[$key] = $this->clear_data($value);
				continue;
			}
			$key = strip_tags($key);
			$key = trim($key);
			$value = strip_tags($value);
			$value = trim($value);
			$result[$key] = $value;
		}

		return $result;
	}

	/**
	 * Валидация номера телефона
	 * @param string $str - Строка проверки
	 * @param string $name - Имя поля
	 * @return bool
	 */
	private function phone($str, $name){
		$pattern = '/^[0-9+( )-]{7,20}$/';
		if(!preg_match($pattern, $str)){
			$this->error_keys[$name] = "Неверный формат номера";
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Валидация Email
	 * @param string $str - Строка проверки
	 * @param string $name - Имя поля, если нужен целевой вывод
	 * @return bool
	 */
	private function email($str, $name){
		$pattern = "/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i";
		if(!preg_match($pattern, $str)){
			$this->error_keys[$name] = "Неверно введен E-mail";
			return false;
		} else {
			return true;
		}
	}

	/**
	 * Проверка полей
	 * @param $arFieldsError - массив обязательных полей
	 * @return bool
	 */
	private function field_check($arFieldsError)
	{
		// Проверка полей
		$error = array();
		foreach($arFieldsError as $key => $value){
			if(empty($this->request[$key])){
				$error[] = $value;
				$this->error_keys[$key] = $arFieldsError[$key];
			}
		}

		if(!empty($error) or !empty($this->error_keys)){
			$this->error = "Пожалуйста, заполните обязательные поля";
			$this->send_ajax();
			return false;
		}

		return true;
	}

}
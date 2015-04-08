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
//		require_once '../vtlib/Vtiger/Module.php';
//		require_once '../modules/Accounts/Accounts.php';
//		
//		$Accounts = new Accounts();
//		$Accounts->Accounts();
//		var_dump($Accounts->column_fields);
		
		//$Accounts->save("Accounts");

		if(true){
			$this->mess = "Ok";
			$this->send_ajax();
		} else {
			$this->error = "Обновление не удалось";
			$this->send_ajax();
			return false;
		}

		return true;

		// Token
		$url = "http://3.dev.ept.ru/webservice.php?operation=getchallenge&username=admin";
		//$url = "http://3.dev.ept.ru/webservice.php?operation=listtypes&session_name=$sessionId";
		$ch = curl_init();
		$arParams = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 30
		);
		curl_setopt_array($ch, $arParams);
		$result = curl_exec($ch);
		$error = curl_error($ch);
		curl_close($ch);

		if($result){
			$token = json_decode($result);
			$token = $token->result->token;
		} else {
			echo "Error: ".$error."\n";
			die;
		}
		
		// Login
		$url = "http://3.dev.ept.ru/webservice.php";
		$fields_string = "";
		$fieldsPost = array(
			"operation" => "login",
			"username" => "admin",
			"accessKey" => urlencode(md5($token."YK0NdZ1h3xtv6oyr"))
		);
		foreach($fieldsPost as $key=>$value) {
			$fields_string .= $key.'='.$value.'&'; 
		}
		$fields_string = rtrim($fields_string, '&');
						
		$ch = curl_init();
		$arParams = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_POST => count($fieldsPost),
			CURLOPT_POSTFIELDS => $fields_string
		);
		curl_setopt_array($ch, $arParams);
		$result = curl_exec($ch);
		$error = curl_error($ch);
		curl_close($ch);

		if($result){
			$sessionId = json_decode($result);
			$sessionId = $sessionId->result->sessionName;
		} else {
			echo "Error: ".$error."\n";
			die;
		}
		
		// Update
		$url = "http://3.dev.ept.ru/webservice.php?operation=listtypes&session_name=$sessionId";
		$ch = curl_init();
		$arParams = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 30
		);
		curl_setopt_array($ch, $arParams);
		$result = curl_exec($ch);
		$error = curl_error($ch);
		curl_close($ch);

		if($result){
			echo $result;
		} else {
			echo "Error: ".$error."\n";
			die;
		}





		die("END");
		
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

	static function vtws_getParameter($parameterArray, $paramName,$default=null){

		if (!get_magic_quotes_gpc()) {
			if(is_array($parameterArray[$paramName])) {
				$param = array_map('addslashes', $parameterArray[$paramName]);
			} else {
				$param = addslashes($parameterArray[$paramName]);
			}
		} else {
			$param = $parameterArray[$paramName];
		}
		if(!$param){
			$param = $default;
		}
		return $param;
	}


}
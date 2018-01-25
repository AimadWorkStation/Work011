<?php 

namespace App;

/**
* 
*/
class Config
{
	private $setting = array(
		"db_user" =>"root",
		"db_pass" =>"",
		"db_host" =>"localhost",
		"db_name" =>"chat_interface"
	);
	private static $_instance;

	public function getInstance(){
		if(is_null(self::$_instance)){
			self::$_instance = $this->setting;
		}
		return self::$_instance;
	}
}
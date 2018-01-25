<?php 
namespace App;
require 'Config.php';
use \PDO;
/**
* database connextion v2.0
*/
class Database 
{
	private $db_name;
	private $db_user;
	private $db_pass;
	private $db_host;
	private $pdo;

	public function __construct()
	{
		$data = new Config();
		$config = $data->getInstance();
		$this->db_name = $config['db_name'];
		$this->db_user = $config['db_user'];
		$this->db_pass = $config['db_pass'];
		$this->db_host = $config['db_host'];
	}
	private function getDbName(){
		return $this->db_name;
	}
	private function getDbUser(){
		return $this->db_user;
	}
	private function getDbPass(){
		return $this->db_pass;
	}
	private function getDbHost(){
		return $this->db_host;
	}
	private function getPDO(){
		//to avoid opening many connection when one is enough
		if($this->pdo === null){
			$dbname = $this->getDbName();
			$dbhost = $this->getDbHost();
			$dbuser = $this->getDbUser();
			$dbpass = $this->getDbPass();
			$pdo = new PDO("mysql:host=$dbhost;dbname=$dbname","$dbuser","$dbpass");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}
	//call a non-static function into static function
	public static function setPDO(){
		return (new self)->getPDO();
	}
}
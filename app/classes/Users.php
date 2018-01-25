<?php 

namespace App;
use \PDO;
require 'Database.php';
/**
* 
*/
class Users
{
	private $fullname;
	private $username;
	private $password;
	private $image;
	private $status;
	private $join_date;
	private $last_visite;

	/**
	 * [__construct description]
	 * @param [type] $fullname [description]
	 * @param [type] $username [description]
	 * @param [type] $password [description]
	 */
	public function __construct($fullname,$username,$password){
		if(strlen($fullname) >= 5 && strlen($username) >= 5 && strlen($password) >= 5){
			$this->fullname = $fullname;
			$this->username = $username;
			$this->password = sha1($password);
			$this->image = 'default.jpg';
			$this->status = 0;
			date_default_timezone_set('UTC');
			$time = strtotime('now', time()-3600);
			$this->join_date = date('y-m-d h:m:s',$time);
		}
		else return 'Errors !!';
	}
	/**
	 * getters
	 * @return [type] [description]
	 */
	public function getUsername(){
		return $this->username;
	}
	public function getFullname(){
		return $this->fullname;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getDateJoin(){
		return $this->join_date;
	}
	/**
	 * [addUser description]
	 * add user to database
	 */
	public static function addUser(){
		try {
			$pdo = Database::setPDO();
			$stmt = $pdo->prepare("insert into user(fullname,username,password,join_date) values (?,?,?,?)");
			$stmt -> execute(array($this->getFullname(),$this->getUsername(),$this->getPassword(),$this->getDateJoin()));	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

	/**
	 * update user image
	 * @param [type] $id    [description]
	 * @param [type] $image [description]
	 */
	public static function UpdateImage($id,$image){
		try {
			$pdo = Database::setPDO();
			$stmt = $pdo->prepare("update user set image = $image where userid = $id");
			$stmt -> execute();	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	/**
	 * [UpdateUser infos fullname and password]
	 * @param [type] $id       [description]
	 * @param [type] $fullname [description]
	 * @param [type] $password [description]
	 */
	public static function UpdateUser($id,$fullname,$password){
		try {
			$pdo = Database::setPDO();
			$pass = sha1($password);
			$stmt = $pdo->prepare("update user set fullname = $fullname, password = $pass where userid = $id");
			$stmt -> execute();	
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
	/**
	 * [checkuser for login]
	 * @param  [type] $username [description]
	 * @param  [type] $password [description]
	 * @return [type]           [description]
	 */
	public static function checkUserLogin($username, $password){
		$pass = sha1($password);
		try {
			$pdo = Database::setPDO();
			$stmt = $pdo ->prepare('select userid,username,password from user where username = ? and password = ?');
			$stmt -> execute(array($username,$pass));
			$count = $stmt->rowCount();
			$row = $stmt->fetch();
			if($count == 0){
				return null;
			}else{
				$data = [
					"id" => $row['userid'],
					"username" => $row['username']
				];
				return $data;
			}
			
		} catch (Exception $e) {
			
		}
	}
	/**
	 * [checkUser for register new user if existe]
	 * @param  [type] $username [description]
	 * @return [data]           [data of users found]
	 */
	public static function checkUserExiste($str){
		$pdo = Database::setPDO();
		$stmt = $pdo -> prepare("select username from user where username = '". $str ."'");
		$stmt -> execute();
		$count = $stmt -> rowCount();
		if($count > 0){
			echo "existe";
		}
		else{
			echo "notExiste";
		}
	}
	/**
	 * get user info by id
	 * @param  [type] $id [description]
	 * @return [data]     [user info]
	 */
	public static function getUser($id){
		$pdo = Database::setPDO();
		$stmt = $pdo -> prepare("select * from user where userid = $id");
		$stmt->exceute();
		return $data = $stmt -> fetch();
	}


}
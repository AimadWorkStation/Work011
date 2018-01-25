<?php 
namespace App;
require 'Users.php';

$user = new Users('ABCD EFJ','abcde','abcde');

$user->addUser();



// $pdo = Database::setPDO();
// $stmt = $pdo->prepare('select * from user where userid = 13');
// $stmt -> execute();
// $row = $stmt->fetch();
// var_dump($row);
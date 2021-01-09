<?php 
//veritabınan bağlanma kodu.
header("Content-Type: text/html; charset=utf-8");
//error_reporting(0);
setlocale(LC_ALL,'tr_TR.UTF-8','tr_TR','tr','turkish');

$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "website"; //oluşturduğum veritabanı adım

try {
    $db= new PDO("mysql:host=$DBhost; dbname=$DBname", $DBuser, $DBpass);

} catch(PDOException $e) {
    echo $e->getMessage();
}
$db->exec("SET NAMES 'utf-8'; SET CHARSET 'utf-8'");

define("_URL", "http://localhost/websitem/");
?>
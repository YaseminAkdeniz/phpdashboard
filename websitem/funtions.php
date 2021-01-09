<?php
define("_HOST","localhost");
define("_DBNAME","website");
define("_DBUSER","root");
define("_DBPASS","");

try {
$db=new PDO("mysql:host="._HOST.";dbname="._DBNAME."",_DBUSER,_DBPASS);

} catch (PDOException $ex) {
  echo $ex->getMessage();

}
?>
 
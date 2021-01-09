<?php 
session_start();
$_SESSION["girisKontrol"]=0; //giriş yapmış
unset($_SESSION["username"]);
header("Location:index.php?i=cikis");
session_destroy();


?>
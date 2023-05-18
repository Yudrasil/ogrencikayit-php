<?php
try {
	$db = new PDO("mysql:host=localhost;dbname=ogrencitakip2;charset=UTF8",'adminn','Pass123..');


} catch (Exception $e) {
	echo $e->getMessage();
	exit();
}
?>
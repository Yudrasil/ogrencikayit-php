<?php 
include "baglan.php";
session_start();
// ADRES SATIRINDAN giris_yapma.php'ye ulaşamaz
if (empty($_POST['k_ad'])) {
	header("Location:giris.php");
}

if (isset($_POST['giris_yap'])) {
	include "verileri_cek.php";
	if ($cekilmis) {
		$_SESSION['kullanici']=$k_adi;
		header("Location:panel.php");
	}
	else{
		echo "<center>";
		echo "HATALI KULLANICI ADI VEYA ŞİFRESİ!";echo "<br>";
		echo "Giriş Sayfasına Yönlendiriliyorsunuz!";
		echo"</center>";
		header("Refresh: 2.5; url="."giris.php");
	}
}
?>
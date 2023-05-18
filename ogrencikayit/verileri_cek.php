<?php 
$k_adi = $_POST['k_ad'] ?? null; //default değeri 'null' olur
$sifre = $_POST['sifre'] ?? null;

$cek= $db->prepare("select * from kullanicilar where kullanici_adi=:kullanicii && sifre=:sifree");
$cek->execute(['kullanicii'=>$k_adi, 'sifree'=>$sifre]);
$cekilmis = $cek->fetch(PDO::FETCH_ASSOC);

//ogrenci 
$cekik= $db->prepare("select * from ogrenci where id=:idd");
$cekik->execute(['idd'=>$_POST['id']]);
$cekik2=$cek->fetch(PDO::FETCH_ASSOC);

?>
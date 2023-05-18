<?php 
include "baglan.php";
$komut= $db->prepare("select * from ogrenci where id=".$_GET['id']);
$komut->execute();
$tablo = $komut->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['kayit_et'])) {
	echo "string";
	if ($_POST['o_ad']!="") {
		$insertet = $db->prepare("insert into ogrenci set
			ad=:adi,
			soyad=:sadi,
			numara=:no,
			sinif=:snf,
			telefon=:tel;
			");
		$insertet->execute(['adi'=>$_POST['o_ad'],'sadi'=>$_POST['o_sad'],'no'=>$_POST['o_no'],'snf'=>$_POST['o_snf'],'tel'=>$_POST['o_tel']]);
	}
	else
	{
		echo "<center> <p>BOŞ ALAN BIRAKMAYIN! </p> </center>";
		header("Refresh:3; url=panel.php");
	}
	if ($insertet) {
		header("Location:panel.php");
	}
}

if ($_GET['islem']=="sil") {
	$sila = $db->prepare("delete from ogrenci where id =".$_GET['id']);
	$sila->execute();
	header("Location:panel.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="" method="post" style="max-width: 150px;">
		<input type="text" name="adi" value="<?php echo $tablo['ad']; ?>">
		<input type="text" name="sadi" value="<?php echo $tablo['soyad']; ?>">
		<input type="text" name="num" value="<?php echo $tablo['numara']; ?>">
		<input type="number" name="snf" max="12" value="<?php echo $tablo['sinif']; ?>">
		<input type="text" name="tel" value="<?php echo $tablo['telefon']; ?>">
		<input type="hidden" name="idmiz" value="<?php echo $tablo['id']; ?>">
		<input type="submit" name="guncl">
	</form>
	<?php 

	if ($_GET['islem']=="guncelle") {
		if (isset($_POST['guncl'])) {
			echo $_POST['adi'];

			$sila = $db->prepare("UPDATE ogrenci SET ad=:add , soyad=:sad , numara=:num , sinif=:sinif , telefon=:tel where id=".$_POST['idmiz']);

			$sonuc=$sila->execute(array('add'=>$_POST['adi'],'sad'=>$_POST['sadi'],'num'=>$_POST['num'], 'sinif'=>$_POST['snf'], 'tel'=>$_POST['tel']));
		header("Location:panel.php");


			
		}
	}
	?>

	<br>
	
</body>
</html>
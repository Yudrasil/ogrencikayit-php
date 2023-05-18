<?php
session_start();
if (empty($_SESSION['kullanici'])) {
	header("Location: giris.php");
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="tasarim2.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title></title>

</head>
<body>

	<form action="panel.php?" method="post">
		<div class="yenile"><button name="yenile">Yenile</button></div>
	</form>
	
	<!-- style="display: block; border: 1px solid green; height: 30px; overflow-y: scroll"  -->
	<form method="post">
		<table cellspacing="0" cellpadding="1" border="1" class="tablom">
			<tr>
				<th>SIRA</th>
				<th>ID</th>
				<th>Adı</th>
				<th>Soyadı</th>
				<th>Numarası</th>
				<th>Sınıfı</th>
				<th>Telefonu</th>
				<th>İŞLEMLER</th>
			</tr>
			<?php 
			$islem='';
			include "baglan.php";
			$select=$db->prepare("select * from ogrenci");
			$select->execute();
			$sirano=0;
			while ($select2=$select->fetch(PDO::FETCH_ASSOC)) {$sirano++; ?>
				<tr>
					<td><?php echo $sirano ?></td>
					<td><?php echo $select2['id']?></td>
					<td><?php echo $select2['ad'] ?></td>
					<td><?php echo $select2['soyad'] ?></td>
					<td><?php echo $select2['numara'] ?></td>
					<td><?php echo $select2['sinif'] ?></td>
					<td><?php echo $select2['telefon'] ?></td>
					<td> <button name="sille"><a href="islemler.php?id=<?php $islem='sil'; echo $select2['id']; ?>&islem=<?php echo $islem; ?>">Sil</button> </a>

						<button name="guncelle"><a href="islemler.php?id=<?php $islem='guncelle'; echo $select2['id']; ?>&islem=<?php echo $islem; ?>">Düzenle</button> </a></td>
					</tr>
				<?php }?>

			</form>

		</table>
		<form action="islemler.php" method="post">
			<center class="kayit_bolum">

				Öğrenci Adını Giriniz:<input type="text" name="o_ad" style="margin: 5px;"> <br>
				Öğrenci Soyadını Giriniz:<input type="text" name="o_sad" style="margin: 5px;"> <br>
				Öğrenci Numarasını Giriniz:<input type="text" name="o_no" style="margin: 5px;"><br>
				Öğrenci Sınıfını Giriniz:<input type="number" max="12" min="0" maxlength="2" style="width: 50px; margin: 5px;" name="o_snf"><br>
				Öğrenci Telefonunu Giriniz: <input type="text" name="o_tel">
				<br>
				<input type="submit" style="margin: 10px; font-size: 19px;" name="kayit_et" value="KAYIT ET">
			</center>
		</form>

		<a href="logout.php" style="position: absolute;top: 0% ;left: 90%;">ÇIKIŞ YAP</a>
	</body>
	</html>
	<?php  #session_destroy(); ?>
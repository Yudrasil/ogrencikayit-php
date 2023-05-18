
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Öğrenci Takip</title>
	<link rel="stylesheet" type="text/css" href="giris_tasarimi.css">
</head>
<body>
	<form action="giris_yapma.php" method="post">
		<h1 style="position:absolute; top: 10%; left: 40%;">Giriş Yapınız</h1>
		<div class="giris_kismi">
			<div class="k_adi"><input type="text" name="k_ad" placeholder="Kullanıcı Adınızı Giriniz." required value="admin"> </div>
			<div class="sifre"><input type="password" name="sifre" placeholder="Şifrenizi Giriniz." required value="123"> </div>
		</div>
		<div class="giris_buton"><input type="submit" name="giris_yap" style="position: relative;" value="Giriş Yap"></div>

	</form>
</body>
</html>
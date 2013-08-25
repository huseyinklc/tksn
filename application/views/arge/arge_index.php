<html>
	<head>
		<meta charset="utf-8">
		<title>Başlık bu</title>
	</head>
	
	<body>
		<h1>Arge sayfası</h1>
		<p>Projeler</p>

		<?php
			if($this->session->userdata('uyelik_turu') == 1){
				echo 'arge sayfasi bu borumu';
			}
			echo $this->session->userdata('uyelik_turu');


		 ?>

		 <a href="./proje_ekle">Yeni Proje eklemek için tıklayınız..</a>
		<a href="giris/cikis">Çıkış için tıklayınız...</a>
	</body>

</html>
<!-- arge_index.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/arge_index.php -->
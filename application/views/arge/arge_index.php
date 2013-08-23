<html>
	<head>
		<meta charset="utf-8">
		<title>Başlık bu</title>
	</head>
	
	<body>
		<h1>Arge sayfası</h1>
		<p>Projeler</p>

		<?php
			echo '<h2>' . $hata_mesaji . '</h2>';

			foreach ($proje_bilgileri as $proje) {
				echo '<p>';
				echo '<a href="'. './proje/proje_goster/' . $proje->proje_id . '">';
				echo  $proje->proje_ismi . '<br />';
				echo '<img src="../../../asset/image/proje_resimleri/' . $proje->proje_resmi . '">';
				echo '</a>';
				echo '</p>';
			}
		 ?>

		 <a href="./proje_ekle">Yeni Proje eklemek için tıklayınız..</a>
		<a href="giris/cikis">Çıkış için tıklayınız...</a>
	</body>

</html>
<!-- arge_index.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/arge_index.php -->
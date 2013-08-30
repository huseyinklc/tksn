<html>
	<head>
		<meta charset="utf-8">
		<title>Proje Detay</title>
	</head>
	
	<body>
		<h1>Proje Detay</h1>
	    	<?php
				foreach ($proje_bilgileri as $Proje) {
					echo '<strong>Proje Ismi: </strong>' . $Proje->proje_ismi . '<br />';
					echo '<strong>Proje Tanımı: </strong>' . $Proje->proje_tanimi . '<br />';

				}
			?>		
	</body>
</html>
<!-- proje_detay.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/proje/ -->
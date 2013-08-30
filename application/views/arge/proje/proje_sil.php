<html>
	<head>
		<meta charset="utf-8">
		<title>Proje Sil</title>
	</head>
	
	<body>
		<h3>Aşağıdaki bilgilere sahip proje silinecek, silmek istediğinize emin misiniz ?</h3>
	    	<?php
				foreach ($proje_bilgileri as $proje) {
					echo '<strong>Proje Ismi: </strong>' . $proje->firma_ismi . '<br />';
					echo '<strong>Proje Özellikleri </strong>' . $bilgi->eleman_kodu . '<br />';
					echo '<a href="../proje_sil_onay/' . $proje->proje_id . '">Sil</a>';
				}
			?>		
	</body>
</html>
<!-- eleman_sil.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/eleman -->
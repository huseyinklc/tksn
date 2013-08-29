<html>
	<head>
		<meta charset="utf-8">
		<title>Eleman Sil</title>
	</head>
	
	<body>
		<h3>Aşağıdaki bilgilere sahip eleman silinecek, silmek istediğinize emin misiniz ?</h3>
	    	<?php
				foreach ($tum_ayrinti_bilgiler as $bilgi) {
					echo '<strong>Firma Ismi: </strong>' . $bilgi->firma_ismi . '<br />';
					echo '<strong>Eleman Kodu: </strong>' . $bilgi->eleman_kodu . '<br />';
					echo '<strong>Eleman Türü: </strong>' . $bilgi->eleman_turu . '<br />';
					echo '<strong>Kilif: </strong>' . $bilgi->kilif_tipi . '<br />';
					echo '<strong>Arge Adet: </strong>' . $bilgi->arge_adet . '<br />';
					echo '<strong>Depo Adet: </strong>' . $bilgi->depo_adet . '<br />';
					echo '<strong>Nerde: </strong>' . $bilgi->eleman_saklama_durumu . '<br />';
					echo '<strong>Numune :</strong>' . $bilgi->numune_mi . '<br />';
					echo '<strong>Özellikleri: </strong>' . $bilgi->ozellik . '<br />';
					echo '<a href="../eleman_sil_onay/' . $bilgi->eleman_id . '">Sil</a>';
				}
			?>		
	</body>
</html>
<!-- eleman_sil.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/eleman -->
<html>
	<head>
		<meta charset="utf-8">
		<title>Eleman Göster</title>
	</head>
	
	<body>
		<h1>Eleman Göster</h1>
	<table >
	    <thead WIDTH="100%">
	        <tr><th>Firma İsmi</th><th>Eleman Kodu</th>
	        <th>Eleman Türü</th><th>Kılıf</th>
	        <th>Arge Adet</th><th>Depo Adet</th>
	        <th>Eleman Saklama Durumu</th><th>Numune</th>
	        <th>Detay</th><th>Değiştir</th>
	        <th>Sil</th></tr>
	    </thead>
	    <tbody WIDTH="100%">
	    	<?php 
				foreach ($tum_bilgiler as $tum_bilgiler) {
				echo '<tr><td>' . $tum_bilgiler->firma_ismi . '</td>';
				echo '<td>' .$tum_bilgiler->eleman_kodu . '</td>';
				echo '<td>' . $tum_bilgiler->eleman_turu . '</td>';
				echo '<td>' .$tum_bilgiler->kilif_tipi . '</td>';
				echo '<td>' . $tum_bilgiler->arge_adet . '</td>';
				echo '<td>' . $tum_bilgiler->depo_adet . '</td>';
				echo '<td>' . $tum_bilgiler->eleman_saklama_durumu . '</td>';
				echo '<td>' .$tum_bilgiler->numune_mi . '</td>';
				echo '<td>' . '<a href="eleman_detay/' .$tum_bilgiler->eleman_id  .'" >Detay </a>' .'</td>';
				echo '<td>' . '<a href="eleman_bilgisini_degistir/' .$tum_bilgiler->eleman_id  .'" >Değiştir </a>' .'</td>';
				echo '<td>' . '<a href="eleman_sil/' .$tum_bilgiler->eleman_id  .'" >Sil </a>' .'</td>';
				}

			?>
	    </tbody>
	</table>

	
		
	</body>

</html>
<!-- eleman_goster.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/eleman -->
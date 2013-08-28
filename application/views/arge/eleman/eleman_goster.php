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
	        <th>Adet</th><th>Numune</th>
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
				echo '<td>' . $tum_bilgiler->adet . '</td>';
				echo '<td>' .$tum_bilgiler->numune_mi . '</td>';
				echo '<td>' . 'detay' .'</td>';
				echo '<td>' . 'değiştir' .'</td>';
				echo '<td>' . 'sil' .'</td>';
				}

			?>
	    </tbody>
	</table>

	
		
	</body>

</html>
<!-- eleman_goster.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/eleman -->
<html>
	<head>
		<meta charset="utf-8">
		<title>Proje Göster</title>
	</head>
	
	<body>
		<h1>Proje Bilgileri: </h1>
	<table >
	    <thead WIDTH="100%">
	        <tr><th>Proje İsmi</th><th>Proje Detay</th>
	        <th>Proje Değiştir</th><th>Proje Sil</th>
	    </thead>
	    <tbody WIDTH="100%">
	    	<?php 
				foreach ($proje_bilgileri as $proje) {
				echo '<tr><td>' . $proje->proje_ismi . '</td>';
				echo '<td>' . '<a href="proje/proje_detay/' .$proje->proje_id  .'" >Detay </a>' .'</td>';
				echo '<td>' . '<a href="proje/proje_bilgisini_degistir/' .$proje->proje_id  .'" >Değiştir </a>' .'</td>';
				echo '<td>' . '<a href="proje/proje_sil/' .$proje->proje_id  .'" >Sil </a>' .'</td>';
				}

			?>
	    </tbody>
	</table>

	
		
	</body>

</html>
<!-- proje_goster.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/proje -->
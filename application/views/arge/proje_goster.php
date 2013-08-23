<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $proje_bilgileri[0]->proje_ismi; ?></title>
	</head>
	
	<body>
		<h1><?php echo $proje_bilgileri[0]->proje_ismi; ?></h1>

		<? echo '<img src="../../../asset/image/proje_resimleri/' . $proje_bilgileri[0]->proje_resmi . '">'; ?>
		<p><strong>Proje Açıklaması:</strong><br />
			<?php echo $proje_bilgileri[0]->proje_tanimi; ?>
		</p>
		
	</body>

</html>
<!-- proje_goster.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/proje_goster.php -->
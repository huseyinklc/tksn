<html>
	<head>
		<meta charset="utf-8">
		<title>Kılıf Ekle</title>
	</head>	
	<body>
		<h1>Kılıf Ekle</h1>
		
		<?php echo $form_hatalari; ?>

		<?php echo form_open_multipart('arge/eleman/kilif_ekle_kontrol') ?>
		<p>
			<?php
				echo form_label('Kılıf Tipi: ', 'kilif_tipi');
				$kilif_tipi_ozellikleri = array('name'=>'kilif_tipi', 'id'=>'kilif_tipi', 'maxlenght'=>'70');
				echo form_input($kilif_tipi_ozellikleri);
				echo form_submit('ekle', 'Ekle');
				echo form_close(); 
			?>	
		</p>
	</body>
</html>
<!-- End of the file: kilif_ekle.php -->
<!-- Lacation: ./applicatipn/views/arge/eleman/ -->
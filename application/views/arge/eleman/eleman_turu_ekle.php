<html>
	<head>
		<meta charset="utf-8">
		<title>Eleman Türü Ekle</title>
	</head>	
	<body>
		<h1>Eleman Türü Ekle</h1>
		
		<?php echo $form_hatalari; ?>

		<?php echo form_open_multipart('arge/eleman/eleman_turu_ekle_kontrol') ?>
		<p>
			<?php
				echo form_label('Eleman Türü: ', 'elaman_turu');
				$eleman_turu_ozellikleri = array('name'=>'eleman_turu', 'id'=>'eleman_turu', 'maxlenght'=>'70');
				echo form_input($eleman_turu_ozellikleri);
				echo form_submit('ekle', 'Ekle');
				echo form_close(); 
			?>	
		</p>
	</body>
</html>
<!-- End of the file: eleman_turu_ekle.php -->
<!-- Lacation: ./applicatipn/views/arge/eleman/ -->
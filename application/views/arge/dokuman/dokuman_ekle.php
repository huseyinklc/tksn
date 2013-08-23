<html>
	<head>
		<meta charset="utf-8">
		<title>Döküman Başarılı </title>
	</head>
	
	<body>
		<?php echo $dosya_yukleme_hatasi; ?>
		<?php $this->load->helper('form'); ?>
		<?php echo form_open_multipart('arge/dokuman/form_kontrolu'); ?>

	<p>
	<label>Lütfen Eklemek istediğiniz dökümanı seçiniz: </label>

	<?php 
		echo form_upload('Dokuman');
		echo form_submit('yukle', 'yukle');
		echo form_close();
	?>

	</p>
	
	</body>

</html>
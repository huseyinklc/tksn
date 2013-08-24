<html>
	<head>
		<meta charset="utf-8">
		<title>Şema Ekle</title>
	</head>
	
	<body>

	<? echo $dosya_yukleme_hatasi; ?>
	<?php $this->load->helper('form'); ?>
	<?php echo form_open_multipart('arge/sema_ekle/sema_eklendi'); ?>

	<p>
	<label>Lütfen Eklemek istediğiniz şemayı seçiniz: </label>

	<?php 
		echo form_upload('sema');
		echo form_submit('yukle', 'yukle');
		echo form_close();
	?>

	</p>
	</body>

</html>
<!-- End of the file sema_ekle.php -->
<!-- Location: ./application/views/arge/sema/ -->
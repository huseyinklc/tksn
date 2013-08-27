<html>
	<head>
		<meta charset="utf-8">
		<title>Firma Ekle</title>
	</head>	
	<body>
		<h1>Firma Ekle</h1>
		
		<!-- Varsa form hataları gösterilir -->
		<?php echo $form_hatalari; ?>


		<!-- Form firma_ekle_kontrol'e gönderilecek şekilde açıldı-->
		<?php echo form_open_multipart('arge/eleman/firma_ekle_kontrol') ?>

		<!-- Firma ismi -->
		<p>
			<?php
				echo form_label('Firma Ismi: ', 'firma_ismi');
				$firma_ismi_ozellikleri = array('name'=>'firma_ismi', 'id'=>'firma_ismi', 'maxlenght'=>'70');
				echo form_input($firma_ismi_ozellikleri);
			?>	
		</p>
		<!-- Telefon numarası -->
		<p>
			<?php
				echo form_label('Firma Telefonu: ', 'tel');
				$tel_ozellikleri = array('name'=>'tel', 'id'=>'tel', 'maxlenght'=>'70');
				echo form_input($tel_ozellikleri);
			?>	
		</p>
		<!-- Mail adresi  -->
		<p>
			<?php
				echo form_label('Firma Mail Adresi: ', 'mail');
				$mail_ozellikleri = array('name'=>'mail', 'id'=>'mail', 'maxlenght'=>'70');
				echo form_input($mail_ozellikleri);
			?>	
		</p>
		<!-- Adresi -->
		<p>
			<?php
				echo form_label('Firma Adresi: ', 'adres');
				echo '</p>';
				$adres_ozellikleri = array('name'=>'adres', 'id'=>'adres', 'maxlenght'=>'5000', 'rows'=>'20', 'cols'=>'30');
				echo form_textarea($adres_ozellikleri);
			?>	
		<!-- Form submit edilir ve kapatılır -->
		<?php
			echo form_submit('ekle', 'Ekle');
			echo form_close();
		?>
	</body>
</html>
<!-- End of the file: firma_ekle.php -->
<!-- Lacation: ./applicatipn/views/arge/eleman/ -->
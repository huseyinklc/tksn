<html>
	<head>
		<meta charset="utf-8">
		<title>Başlık bu</title>
	</head>
	
	<body>
		<h1>Malzeme Girişi</h1>

		<?php $this->load->helper('form'); ?>


		 <!-- Önce beklenen malzemeler database'den döngü ile çekilecek eğer beklenen malzeme yok ise -->
		<!-- isim ve kodu ile giriş yapılacak.. -->

		<?php echo form_open('gelen_malzeme_gir/formKontrolu'); ?>

		<p>
		<label>Firma İsmi: </label>
		<?php
			$gelen_firma = array('name'=>'gelen_firma', 'id'=>'gelen_firma');
			echo form_input($gelen_firma);
		?>
		</p>

		<p>
			<label>Ürün İsmi: </label>
			<?php
				$urun_ismi = array('name'=>'urun_ismi', 'id'=>'urun_ismi');
				echo form_input($urun_ismi)
			?>
		<p>
		
		<p> 
			<label> Ürün Kodu: </label>
			<?php
				$urun_kodu = array('name'=>'urun_kodu', 'id'=>'urun_kodu');
				echo form_input($urun_kodu);
			?>
		</p>
			<?php
				echo form_submit('ekle', 'Ekle');

				form_close();
			?>
	</body>

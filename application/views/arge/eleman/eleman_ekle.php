<html>
	<head>
		<meta charset="utf-8">
		<title>Eleman Ekleme Sayfası</title>
	</head>
	
	<body>
		<h1>Eleman Ekleme Sayfası</h1>

		<?php echo form_open_multipart('arge/eleman/eleman_ekle_kontrol') ?>
		<p>
			<?php
				echo form_label('Eleman Kodu: ', 'elaman_kodu'); 
				$eleman_kodu_ozellikleri = array('name'=>'eleman_kodu', 'id'=>'eleman_kodu', 'maxlenght'=>'70');
				echo form_input($eleman_kodu_ozellikleri);
			?>	
		</p> 
			<!-- Eleman türü ve firma türü droplist şeklinde echo edilecek -->
			<!-- Droplist'te echo edilmeden önce database'den bilgiler çekilecek.. -->
		<p>
			<?php
				echo form_label('Eleman Türü: ', 'eleman_turu'); 
				$eleman_turu = array('bir'=>'bir', 'iki'=>'iki');
				echo form_dropdown('eleman_turu', $eleman_turu);
			?>	
		</p> 

		

		<!-- Resim yükleme gelecek -->
		<!-- Kılıf id gelecek -->
		<p>
			<?php
				echo form_label('Elaman Özellikleri: ', 'eleman_ozellik'); 
				$eleman_ozellik_ozellikleri = array('name'=>'eleman_ozellik', 'id'=>'eleman_ozellik', 'maxlenght'=>'1000');
				echo form_input($eleman_ozellik_ozellikleri);
			?>	
		</p>
		<!-- Eleman döküman yükleme gelecek -->
		<p>
			<?php 
				echo form_label('Eleman Adeti: ', 'eleman_adet');
				$eleman_adet_ozellikleri = array('name'=>'eleman_adet', 'id'=>'eleman_adet', 'maxlenght'=>'5');
				echo form_input($eleman_adet_ozellikleri);
			?>	
		</p>
		<!-- Eleman yükleme sayfası yapılacak!! -->
	</body>

</html>
<!-- eleman_ekle.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/eleman/	 -->
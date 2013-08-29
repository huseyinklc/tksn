<html>
	<head>
		<meta charset="utf-8">
		<title>Eleman Ekleme Sayfası</title>
	</head>
	
	<body>
		<h1>Eleman Ekleme Sayfası</h1>

		<?php echo $form_hatalari; ?>

		<?php echo form_open_multipart('arge/eleman/eleman_ekle_kontrol') ?>
		<p>
			<?php
				echo form_label('Eleman Kodu: ', 'elaman_kodu');
				$eleman_kodu = set_value('eleman_kodu'); 
				$eleman_kodu_ozellikleri = array('name'=>'eleman_kodu', 'id'=>'eleman_kodu', 'maxlenght'=>'70', 'value'=>$eleman_kodu);
				echo form_input($eleman_kodu_ozellikleri);
			?>	
		</p>

		<p>
			<?php
				echo form_label('Firma Ismi: ', 'firma_id'); 
				echo form_dropdown('firma_id', $firma_ismi);
			?>	
		</p> 
		<p>
			<?php
				echo form_label('Eleman Türü: ', 'eleman_turu_id'); 
				echo form_dropdown('eleman_turu_id', $eleman_turu);
			?>	
		</p> 
		<p>
			<?php
				echo form_label('Kılıf Tipi: ', 'kilif_id');
				echo form_dropdown('kilif_id', $kilif_tipi);
			?>	
		</p>
		 <!-- Eleman ekleneceği proje gelecek  -->
		<p>
			<?php
				echo form_label('Elaman Özellikleri: ', 'ozellik');
				echo '</p>';
				$ozellik = set_value('ozellik'); 
				$eleman_ozellik_ozellikleri = array('name'=>'ozellik', 'id'=>'ozellik', 'maxlenght'=>'1000','cols'=>'40', 'rows'=>'20', 'value'=>$ozellik);
				echo form_textarea($eleman_ozellik_ozellikleri);
			?>	
		</p>
		<p>
			<?php 
				echo form_label('Eleman Adeti: ', 'adet');
				$adet = set_value('adet');
				$adet_ozellikleri = array('name'=>'adet', 'id'=>'adet', 'maxlenght'=>'5', 'value'=>$adet);
				echo form_input($adet_ozellikleri);
			?>	
		</p>

		<p>
			<?php
				echo form_label('Numune: ', 'numune');
				echo form_dropdown('numune', $numune_ozellikleri);
			?>	
		</p>
			<?php
				echo form_submit('ekle', 'Ekle');
				echo form_close(); 
			?>
	</body>
</html>
<!-- eleman_ekle.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/eleman/	 -->
<html>
	<head>
		<meta charset="utf-8">
		<title>Eleman Bilgisini Değiştir Sayfası</title>
	</head>
	
	<body>
		<h1>Eleman Bilgisini Değiştir Sayfası</h1>

		<!-- Form hatası varsa bir sonraki çağırmada form hatalrını gösteriyoruz -->
		<?php echo $form_hatalari; ?>

		<!-- Dosya upload için multipart açıldı ama dosya yükleme kısmı başka türlü yapılacak!!!  -->
		<?php echo form_open_multipart('arge/eleman/eleman_bilgisini_degistir_kontrol/' . $eleman_bilgiler[0]->eleman_id) ?>

		<p>
			<?php
				// Etiket
				echo form_label('Eleman Kodu: ', 'elaman_kodu');

				// Hata durumunda form değerini yeniden elde etmek için
				$eleman_kodu = set_value('eleman_kodu');

				// Eğer formda hata durumu oluşmamış ise, database içerisindeki değeri yazıyoruz
				if(!$eleman_kodu) {
					$eleman_kodu = $eleman_bilgiler[0]->eleman_kodu;	
				}

				// Yükelemek istediğimiz özellikler
				$eleman_kodu_ozellikleri = array('name'=>'eleman_kodu', 'id'=>'eleman_kodu', 'maxlenght'=>'70', 'value'=>$eleman_kodu);

				// Form elemanını ekrana yazıyoruz
				echo form_input($eleman_kodu_ozellikleri);
			?>	
		</p>

		<p>
			<?php
				// Etiket
				echo form_label('Firma Ismi: ', 'firma_id'); 

				// dropdown liste, 3. değer eleman eski seçilmiş değeri
				echo form_dropdown('firma_id', $firma_ismi, $eleman_bilgiler[0]->firma_id);
			?>	
		</p> 
		<p>
			<?php
				// Etiket
				echo form_label('Eleman Türü: ', 'eleman_turu_id'); 

				// dropdown liste, 3. değer eleman eski seçilmiş değeri
				echo form_dropdown('eleman_turu_id', $eleman_turu, $eleman_bilgiler[0]->eleman_turu_id);
			?>	
		</p> 


		<p>
			<?php
				// Etiket
				echo form_label('Kılıf Tipi: ', 'kilif_id');

				// dropdown liste, 3. değer eleman eski seçilmiş değeri
				echo form_dropdown('kilif_id', $kilif_tipi, $eleman_bilgiler[0]->kilif_id);
			?>	
		</p> 
		<p>
			<?php
				// Etiket
				echo form_label('Elaman Özellikleri: ', 'ozellik');
				echo '</p>';

				// Form hatalı ise aynı değer ile formu tekrar yüklüyor
				$ozellik = set_value('ozellik');
				

				// Eğer form ilk defa yükleniyorsa database değerini yüklüyor
				if(!$ozellik) {
					$ozellik = $eleman_bilgiler[0]->ozellik;
				} 

				// Ozellikler
				$eleman_ozellik_ozellikleri = array('name'=>'ozellik', 'id'=>'ozellik', 'maxlenght'=>'1000','cols'=>'40', 'rows'=>'20', 'value'=>$ozellik);
				
				// text area olarak ekrana basıyoruz
				echo form_textarea($eleman_ozellik_ozellikleri);
			?>	
		</p>

		<p>
			<?php 
				// Etiket
				echo form_label('Eleman Adeti: ', 'adet');

				// Form hatalı ise aynı değer ile formu tekrar yüklüyor
				$adet = set_value('adet');

				// Eğer form ilk defa yükleniyorsa database değerini yüklüyor
				if(!$adet) {
					$adet = $eleman_bilgiler[0]->adet;
				} 

				// Ozellikler
				$adet_ozellikleri = array('name'=>'adet', 'id'=>'adet', 'maxlenght'=>'5', 'value'=>$adet);

				// input olarak ekrana basıyoruz
				echo form_input($adet_ozellikleri);
			?>	
		</p>

		<p>
			<?php
				// Etiket 
				echo form_label('Numune: ', 'numune');

				// Etiket içinde bulunan değerler
				$numune_ozellikleri = array('0'=>'Hayır', '1'=>'Evet');

				// dropdown liste, 3. değer eleman eski seçilmiş değeri
				echo form_dropdown('numune', $numune_ozellikleri, $eleman_bilgiler[0]->numune);
			?>	
		</p>
			<?php
				echo form_submit('ekle', 'Değiştir');
				echo form_close(); 
			?>
	</body>
</html>
<!-- eleman_ekle.php dosyasının sonu  -->
<!-- Lacation: ./applicatipn/views/arge/eleman/	 -->
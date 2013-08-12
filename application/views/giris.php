<html>
<head>
	<meta charset="utf-8">
	<title>Giriş Sayfası</title>
	<style type="text/css">
	body {
		background: #b6b6b6;
		margin: 0;
		padding: 0;
		font-family: arial;
	}
	#giris_formu {
		width: 300px;
		background: #f0f0f0;
		border: 1px solid white;
		margin: 205px auto;
		padding: 1em;

	}

	</style>
</head>
<body>
	
	<!-- form yardımcı dosyasını yükledik -->
	<?php $this->load->helper('form'); ?>
	<div id =giris_formu>

	<!-- form controller daki formKontrolu fonksiyonuna submit edecek şekilde ayarladık  -->
	<?php echo form_open('giris/formKontrolu'); ?>

	
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>
		<label>Kullanıcı Adı:
			<?php 

			$kullanici_adi_formu = array('name'=>'kadi', 'id'=>'kadi', 'maxlength'=>'25');
			echo form_input($kullanici_adi_formu); ?>
		</label>
	</p>
	<p>
		<label>Şifre:</label>
			<?php $sifre = array('name'=>'sifre', 'id'=>'sifre', 'maxlength'=>'20'); 
					echo form_password($sifre);
			?>
		<p><label>
			<?php $hatirla = array('name'=>'hatirla', 'id'=>'hatirla', 'checked'=>False); ?>
			<?php echo form_checkbox($hatirla); ?>
		Beni Hatırla</label>
		</p>
	</p>
	<p>
		<?php echo form_submit('giris', 'Giriş'); ?>
	</p>
		<?php echo form_close();?>
	</div>
</body>
</html>
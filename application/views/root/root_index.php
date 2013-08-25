<html>
	<head>
		<meta charset="utf-8">
		<title>Başlık bu</title>
		<?php 
		?>
	</head>
	
	<body>
		<h1>Root sayfası</h1>
		<p>Deneme</p>
		<?php if ($this->session->userdata('uyelik_turu') == 0) {
			echo 'hadi gene iyisin';
		} else {
			echo $this->session->userdata('uyelik_turu');
			echo 'i m going home mum';
		}
		?>
		<a href="giris/cikis">Çıkış için tıklayınız...</a>
	</body>
</html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Başlık bu</title>
		<?php 
			print_r($this->session->all_userdata());
			echo $this->session->userdata('uyelik_turu');
		?>
	</head>
	
	<body>
		<h1>Root sayfası</h1>
		<p>Deneme</p>
		<a href="giris/cikis">Çıkış için tıklayınız...</a>
	</body>

</html>
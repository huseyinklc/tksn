<html>
	<head>
		<meta charset="utf-8">
		<title>Proje Başarılı Bir Şekilde Eklendi</title>
	</head>
	
	<body>
		<h1>Proje Başarılı Bir Şekilde Eklendi!!!</h1>
		
		<img src="images.jpeg" />
		<p>
		<?php echo '<strong>projenin ismi: </strong>' . $proje_ismi; ?>
		</p>
		<p>
		<?php echo 'proje resmi: ';
		print_r($upload_bilgileri);
		 echo '<img src="/opt/lampp/htdocs/tksn/uploads/images.jpeg" />';
		 // echo $upload_bilgileri['upload_data']['orig_name'];
		 echo getcwd();
		 ?>
		</p>
		<p>
		<?php echo $kisa_proje_tanimi; ?>
		</p>
		
	</body>

</html>
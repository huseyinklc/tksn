<html>
	<head>
		<meta charset="utf-8">
		<title>Proje Başarılı Bir Şekilde Eklendi</title>
	</head>
	
	<body>
		<h1>Proje Başarılı Bir Şekilde Eklendi!!!</h1>
		
		
		<p>
		<?php echo '<strong>Eklenen projenin ismi: </strong>' . $proje_ismi; ?>
		</p>
		<p>
		<?php echo '<strong>Eklenen proje resmi: </strong>';
		
		 echo "<img src='../../asset/image/proje_resimleri/" .  $upload_bilgileri['upload_data']['orig_name'] . "' />";
		 ?>
		</p>
		<p>
		<?php echo $kisa_proje_tanimi; ?>
		</p>
		
	</body>

</html>
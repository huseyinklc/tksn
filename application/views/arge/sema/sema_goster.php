<html>
	<head>
		<meta charset="utf-8">
		<title>Şemalar</title>
	</head>
	
	<body>
		<h1>Şemalar</h1>
			<?php
				foreach ($sema_bilgileri as $sema) {
					echo '<img src="../../asset/image/sema/' . $sema->sema_ismi . '" />';
				}
			 ?>	
	</body>
</html>
<!-- End of the file sema_goster.php -->
<!-- Location: ./application/views/arge/sema/ -->
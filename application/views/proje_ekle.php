<html>
<head>
	<meta charset="utf-8">
	<title>Upload Form</title>
</head>
<body>
<p>Lütfen Eklemek istediğiniz proje resmini seçiniz</p>

<?php echo $hata; ?>

<?php echo form_open_multipart('proje_ekle/form_upload');?>
<p>
<label>Proje ismi: </label>
<?php 
	$isim_formu_ozellikleri = array('name'=>'proje_ismi', 'id'=>'proje_ismi', 'maxlenght'=>'50',);
	echo form_input($isim_formu_ozellikleri);
 ?>
</p>
<?php 
	$upload_form_ozellikleri = array('type'=>'file', 'name'=>'userfile');
	echo	form_upload($upload_form_ozellikleri);	
?>



<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>
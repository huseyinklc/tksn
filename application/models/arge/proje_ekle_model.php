<?php

	class proje_ekle_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}

		function proje_ekledeki_bilgileri_database_aktarma($formdan_suzulen_veriler)
		{	
			// formdan gelen kontrol edilmiş array biçimindeki değişkenler ayrıştırılıyor
			$proje_ismi = $formdan_suzulen_veriler['proje_ismi'];
			$proje_tanimi = $formdan_suzulen_veriler['proje_tanimi'];
			$proje_resmi = $formdan_suzulen_veriler['proje_resmi'];

			// database eklenecek bilgiler array içerisine aktarılıyor
			$database_eklenecek_veriler = array('proje_ismi'=>"$proje_ismi",'proje_resmi'=>"$proje_resmi", 'proje_tanimi'=>"$proje_tanimi");
			
			// database insert etme işlemi başarılı ise true döndürüyoruz
			if ($this->db->insert('proje', $database_eklenecek_veriler)) {
				return true;
			}

		}

		function proje_resmi_upload_ozellikleri()
		{
			$proje_resmi_upload_ozellikleri['upload_path'] = './asset/image/proje_resimleri/';
			$proje_resmi_upload_ozellikleri['allowed_types'] = 'gif|jpg|png|jpeg';
			$proje_resmi_upload_ozellikleri['max_size']	= '2048';
			$proje_resmi_upload_ozellikleri['max_width']  = '1024';
			$proje_resmi_upload_ozellikleri['max_height']  = '768';

			return $proje_resmi_upload_ozellikleri;
		}

	}

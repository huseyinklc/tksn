<?php

	class Dokuman_model extends CI_Model 
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function dokuman_upload_ozellikleri()
		{
			$dokuman_upload_ozellikleri['upload_path'] = './asset/documents/proje/';
			$dokuman_upload_ozellikleri['allowed_types'] = 'gif|jpg|png|jpeg|doc|docx|ppt|pdf|odt|
															xls|xlsx|pptx|odf|ods|odp';
			$dokuman_upload_ozellikleri['max_size']	= '2048';


			return $dokuman_upload_ozellikleri;
		}
		public function dokuman_database_ekle($formdan_suzulen_veriler)
		{

			$dokuman_ismi = $formdan_suzulen_veriler['dokuman_ismi'];

			// database eklenecek bilgiler array içerisine aktarılıyor
			$database_eklenecek_veriler = array('proje_ismi'=>"$proje_ismi",'dokuman_ismi'=>"$dokuman_ismi", 'proje_tanimi'=>"$proje_tanimi");
			
			// database insert etme işlemi başarılı ise true döndürüyoruz
			if ($this->db->insert('proje', $database_eklenecek_veriler)) {
				return true;
			}
		}
	} 
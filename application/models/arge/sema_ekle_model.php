<?php

	class Sema_Ekle_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function sema_upload_ozellikleri()
		{
			$sema_upload_ozellikleri['upload_path'] = './asset/image/proje_resimleri';
			$sema_upload_ozellikleri['allowed_types'] = 'gif|jpg|png|jpeg';
			$sema_upload_ozellikleri['max_size']	= '2048';
			$sema_upload_ozellikleri['max_width']  = '1024';
			$sema_upload_ozellikleri['max_height']  = '768';

			return $sema_upload_ozellikleri;
		}
		public function sema_database_ekle()
		{

			$proje_resmi = $formdan_suzulen_veriler['proje_resmi'];

			// database eklenecek bilgiler array içerisine aktarılıyor
			$database_eklenecek_veriler = array('proje_ismi'=>"$proje_ismi",'proje_resmi'=>"$proje_resmi", 'proje_tanimi'=>"$proje_tanimi");
			
			// database insert etme işlemi başarılı ise true döndürüyoruz
			if ($this->db->insert('proje', $database_eklenecek_veriler)) {
				return true;
			}
		}
	}
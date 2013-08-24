<?php

	class Sema_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		/**
		 * upload edilecek şema özelliklerini tutuyoruz. Controller'den çağırıp
		 * gerekli kütüphane yüklemesinde kullanıyoruz.
		 *  
		 * @return array
		 */
		public function sema_upload_ozellikleri()
		{
			$sema_upload_ozellikleri['upload_path'] = './asset/image/sema/';
			$sema_upload_ozellikleri['allowed_types'] = 'gif|jpg|png|jpeg';
			$sema_upload_ozellikleri['max_size']	= '2048';
			$sema_upload_ozellikleri['max_width']  = '1024';
			$sema_upload_ozellikleri['max_height']  = '768';

			return $sema_upload_ozellikleri;
		}
		
		/**
		 * formdan gelen ve kontrole edilmiş verileri database içine yazıyoruz..
		 * 
		 * @return boolean
		 */
		public function sema_database_ekle($formdan_suzulen_veriler)
		{

			// fonksiyona gönderilen bilgiler database yazmak için değişkene aktarılıyor..
			$sema_ismi = $formdan_suzulen_veriler['sema_ismi'];

			// database eklenecek bilgiler array içerisine aktarılıyor..
			$database_eklenecek_veriler = array('sema_ismi'=>"$sema_ismi",);
			
			// database insert etme işlemi başarılı ise true döndürüyoruz
			if ($this->db->insert('sema', $database_eklenecek_veriler)) {
				return true;
			}
		}
	}
/* End of the file sema_model.php */
/* Location: ./application/models/arge/ */
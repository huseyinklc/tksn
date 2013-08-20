<?php

	class Sema_Ekle_Model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function sema_upload_ozellikleri()
		{
			$sema_upload_ozellikleri['upload_path'] = './asset/image/sema/';
			$sema_upload_ozellikleri['allowed_types'] = 'gif|jpg|png|jpeg';
			$sema_upload_ozellikleri['max_size']	= '2048';
			$sema_upload_ozellikleri['max_width']  = '1024';
			$sema_upload_ozellikleri['max_height']  = '768';

			return $sema_upload_ozellikleri;
		}
	}
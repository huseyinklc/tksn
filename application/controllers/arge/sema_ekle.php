<?php

	class Sema_Ekle extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			 $this->load->model('./arge/sema_model');
			 $this->load->helper('form');
		}

		public function index()
		{

			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/sema/sema_ekle', $veri);
		}
		public function sema_eklendi()
		{


			$ayar = $this->sema_model->sema_upload_ozellikleri();
			$this->load->library('upload', $ayar);	
			$sema = 'sema';

			if(!$this->upload->do_upload($sema))
			{
				// hata durumu 
				$veri['dosya_yukleme_hatasi'] = $this->upload->display_errors();
				$this->load->view('arge/sema/sema_ekle', $veri);
 				
			} else {

				// Eğer herşey yolunda gittiyse
				// upload bilgileri ve sema ismini array içine atıyoruz

				$database_yazilacak_bilgiler['upload_bilgileri'] = $this->upload->data();
				$database_yazilacak_bilgiler['sema_ismi'] = $database_yazilacak_bilgiler['upload_bilgileri']['file_name'];

				// formdaki verileri database e yazmayı deniyoruz..
				if($this->sema_model->sema_database_ekle($database_yazilacak_bilgiler)) {
						// eğer form bilgileri database e aktarma işlemi başarılı ise, proje_ekle_başarılı sayfasını girilen bilgiler
						// ile ekrana yazdırıyoruz 
						$this->load->view('arge/sema/sema_ekle_basarili', $database_yazilacak_bilgiler);
				} else {
					// Buraya internal server error sayfası gelecek!!!
					echo 'internal server error';
				}
			}
		}
	}
/* End of the file sema_ekle.php */
/* Location: ./application/controllers/arge/ */
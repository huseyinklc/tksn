<?php

	class Sema_Ekle extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			 $this->load->model('./arge/sema_ekle_model');
			 $this->load->helper('form');
		}

		public function index()
		{

			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/sema_ekle/sema_ekle', $veri);
		}
		public function form_kontrolu()
		{
			$ayar = $this->sema_ekle_model->sema_upload_ozellikleri();

			$this->load->library('upload', $ayar);	
			
			if(! $this->upload->do_upload())
			{
 				// hata durumu 
			} else {

				// Eğer herşey yolunda gittiyse
				// upload bilgileri ve sema ismini array içine atıyoruz

				$database_yazilacak_bilgiler['upload_bilgileri'] = $this->upload->data();
				$database_yazilacak_bilgiler['sema_ismi'] = $database_yazilacak_bilgiler['upload_bilgileri']['file_name'];

				// formdaki verileri database e yazmayı deniyoruz..
				if($this->sema_ekle_model->sema_database_ekle($database_yazilacak_bilgiler)) {
						// eğer form bilgileri database e aktarma işlemi başarılı ise, proje_ekle_başarılı sayfasını girilen bilgiler
						// ile ekrana yazdırıyoruz 
						$this->load->view('arge/sema_ekle/sema_ekle_basarili', $database_yazilacak_bilgiler);
				} else {
					// Buraya internal server error sayfası gelecek!!!
					echo 'internal server error';
				}
			}
		}
	}
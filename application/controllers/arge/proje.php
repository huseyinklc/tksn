<?php
	
	class Proje extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index($proje_id = 0)
		{	
				$this->load->model('arge/proje_model');

				$proje_bilgileri =	$this->proje_model->proje_isimlerini_databaseden_cek();

				$this->load->view('arge/arge_index', $proje_bilgileri);	
		}

		public function proje_goster($proje_id = 0)
		{
			if ($proje_id === 0 ) {
				// buraya hata mesajı gelecek
				$this->load->view('arge_index');
			}
		}

	}
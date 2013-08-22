<?php
	
	class Proje extends CI_Controller
	{
		public $proje_bilgileri;

		public function __construct()
		{
			parent::__construct();
			$this->load->model('arge/proje_model');
			$this->proje_bilgileri = $this->proje_model->proje_isimlerini_databaseden_cek();
		}

		public function index()
		{	
				$this->load->view('arge/arge_index', $this->proje_bilgileri);	
		}

		public function proje_goster($proje_id = 0)
		{
			if ($proje_id === 0 ) {
				// buraya hata mesajı gelecek
				$this->load->view('arge/arge_index');
			} else {
				// proje_id numarasına göre
				$proje_id_bilgileri = $this->proje_model->proje_goster($proje_id); 
				print_r($proje_id_bilgileri);
				$this->load->view('arge/proje_goster');
			}
		}

	}
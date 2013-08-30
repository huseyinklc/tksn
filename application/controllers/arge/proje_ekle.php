<?php
	class Proje_ekle extends CI_Controller
	{
		public function __construct()
		{
			// Framework parent constructor..
			parent::__construct();

			// Form işlemleri için Framework form helper yüklendi
			$this->load->helper('form');

			// Form kontrolü için frameworkün ilgili fonksiyonu yüklendi
			$this->load->library('form_validation');

			// Database işlemleri için proje_model yüklendi..
			$this->load->model('arge/proje_model');

			// Sadece arge kullanıcısının girdiği session ile kontrol edildi
			if( $this->session->userdata('uyelik_turu') != 2) {
			 	redirect('giris', 'refresh');
			 }
		}

		public function index()
		{

		}

		
	} 
/* End of the file: proje_ekle.php */
/* Location: ./application/controllers/arge/ */
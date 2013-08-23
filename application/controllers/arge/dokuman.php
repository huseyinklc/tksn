<?php 

	class Dokuman extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('arge/dokuman_model');
			$this->load->helper('form');
		}

		public function index()
		{
			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/dokuman/dokumanlar');
		}

		public function dokuman_ekle()
		{
			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/dokuman/dokuman_ekle', $veri );
		}
	}
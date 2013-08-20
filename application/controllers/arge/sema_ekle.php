<?php

	class Sema_Ekle extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			 $this->load->model('./arge/sema_ekle_model');
		}

		public function index()
		{

			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/sema_ekle/sema_ekle', $veri);
		}
		public function form_kontrolu()
		{
			$ayar = $this->model->sema_upload_ozellikleri();

			$this->load->library('upload', $config);	
			$this->upload->do_upload();
			print_r($this->upload->data());
			print_r($this->upload->display_errors());
		}
	}
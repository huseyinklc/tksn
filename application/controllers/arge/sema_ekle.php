<?php

	class Sema_Ekle extends CI_Controller
	{
		public function index()
		{
			$veri['upload_sayisi'] = 1;
			$veri['dosya_yukleme_hatasi'] = '';
			$this->load->view('arge/sema_ekle/sema_ekle', $veri);
		}
		public function form_kontrolu()
		{
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpeg|jpg|png';
		$config['max_size'] = '2000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';

			$this->load->library('upload', $config);	
			$this->upload->do_upload();
			print_r($this->upload->data());
			print_r($this->upload->display_errors());
		}
	}
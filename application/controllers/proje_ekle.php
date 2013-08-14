<?php

	class Proje_ekle extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('proje_ekle_m');
		}

		public function index()
		{
			$veri['hata'] = '';
			$this->load->view('proje_ekle', $veri);
		
		}

		public function form_upload()
		{


			
			$this->form_validation->set_rules('proje_ismi', 'Proje ismi', 'required|max_length[15]|min_length[4]|xss_clean');
			$this->form_validation->set_rules('kisa_proje_tanımı', 'Proje Tanımı', 'required|max_length[15]|min_length[4]|xss_clean');

			$veri['proje_ismi'] = $this->input->post('proje_ismi');
			$veri['kisa_proje_tanimi'] = $this->input->post('kisa_proje_tanimi');
			
			$dosya_ayari['upload_path'] = './asset/image/proje_resimleri/';
			$dosya_ayari['allowed_types'] = 'gif|jpg|png|jpeg';
			$dosya_ayari['max_size']	= '2048';
			$dosya_ayari['max_width']  = '1024';
			$dosya_ayari['max_height']  = '768';

			$this->load->library('upload', $dosya_ayari);

			if ( !$this->upload->do_upload() || ($this->form_validation->run() == FALSE) )
			{

				$error = array('error' => $this->upload->display_errors());
				$veri['hata'] = validation_errors();

				$this->load->view('proje_ekle', $veri);			
			}
			else
			{
				
				$veri['upload_bilgileri'] = $this->upload->data();
				$veri['upload_edilen_resmin_ismi'] = $veri['upload_bilgileri']['orig_name'];
				$this->proje_ekle_model->proje_ekledeki_bilgileri_database_aktarma($veri);
				$this->load->view('proje_ekle_basarili', $veri);
				
			}

		}

	} 
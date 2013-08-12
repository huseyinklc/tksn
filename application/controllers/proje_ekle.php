<?php

	class Proje_ekle extends CI_Controller
	{
		public function index()
		{
			$veri['hata'] = '';
			$this->load->helper(array('form'));
			$this->load->view('proje_ekle', $veri);
		
		}

		public function form_upload()
		{


			$this->load->library('form_validation');
			$this->form_validation->set_rules('proje_ismi', 'Proje ismi', 'required|max_length[15]|min_length[4]|alpha_numeric|xss_clean');


			$proje_ismi = $this->input->post('proje_ismi');
			
			$dosya_ayari['upload_path'] = './uploads/';
			$dosya_ayari['allowed_types'] = 'gif|jpg|png';
			$dosya_ayari['max_size']	= '2048';
			$dosya_ayari['max_width']  = '1024';
			$dosya_ayari['max_height']  = '768';

			$this->load->library('upload', $dosya_ayari);

			if ( ! $this->upload->do_upload() || ($this->form_validation->run() == FALSE) )
			{

				$error = array('error' => $this->upload->display_errors());
				$veri['hata'] = validation_errors();
				$this->load->view('proje_ekle', $veri);

				
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				echo $proje_ismi;
				print_r($data);
			}

		}

	} 
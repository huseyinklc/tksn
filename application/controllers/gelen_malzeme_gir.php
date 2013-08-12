<?php

	class Gelen_Malzeme_Gir extends CI_Controller
	{
		public function index()
		{
			$this->load->view('gelen_malzeme_gir');
		}
		public function formKontrolu()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('gelen_firma', 'Firma İsmi', 'trim|required|min_length[3]|max_length[30]|xss_clean');	
			$this->form_validation->set_rules('urun_ismi', 'Ürün ismi', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('urun_kodu', 'Ürün Kodu', 'trim|required|min_length[2]|max_length[30]|xss_clean');

			if($this->form_validation->run() == FALSE)
			{
				$this->load->view('gelen_malzeme_gir');
			} else
				$this->load->view('gelen_malzeme_gir');
			}


		}
	}
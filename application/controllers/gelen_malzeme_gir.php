<?php

	

	class Gelen_Malzeme_Gir extends CI_Controller
	{
		public function index()
		{
			$veri['hata'] = '';

			$this->load->view('gelen_malzeme_gir', $veri);
		}

		/**
		 * gelen_malzeme_gir sayfasından gelen veriler validation dan geçirildi..
		 * eğer herşey yolundaysa bu bilgiler array içerisine atılıp, bu array gelen_malmeme_gir_basarili_sayfasinda 
		 * kullanıcıya gösterilerek, onaylanmış oldu, eğer hata varsa bu hata gelen_malzeme_gir sayfasında gösterildi
		 */
		public function formKontrolu()
		{
			// form_validation kutuphanesi yüklendi ve her alan için çeşitli kurallar tanımlandı..
			$this->load->library('form_validation');
			$this->form_validation->set_rules('gelen_firma', 'Firma İsmi', 'trim|required|min_length[3]|max_length[30]|xss_clean');	
			$this->form_validation->set_rules('urun_ismi', 'Ürün ismi', 'trim|required|min_length[3]|max_length[30]|xss_clean');
			$this->form_validation->set_rules('urun_kodu', 'Ürün Kodu', 'trim|required|min_length[2]|max_length[30]|xss_clean');


			if($this->form_validation->run() == FALSE)
			{
				$veri['hata'] = validation_errors();
				$this->load->view('gelen_malzeme_gir', $veri);
			} else { // Eğer bir hata yoksa

				// formdan gelen bilgileri veri arrayine atıp bunları gelen_malzeme_gir_basarili sayfasında ekrana bastırıyoruz..
				$veri['gelen_firma'] = $this->input->post('gelen_firma');
				$veri['urun_ismi'] = $this->input->post('urun_ismi');
				$veri['urun_kodu'] = $this->input->post('urun_kodu');

				$this->load->view('gelen_malzeme_gir_basarili', $veri);


			}		
		}
	}
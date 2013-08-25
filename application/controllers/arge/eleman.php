<?php 
	class Eleman extends CI_Controller
	{
		public $eleman_turu;
		public $firma_ismi;
		public $kilif_tipi;

		public function __construct()
		{
			// Framework parent constuructor çağırıldı..
			parent::__construct();

			// database işlemleri için model yüklendi
			$this->load->model('arge/eleman_model');

			// Eleman türleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->eleman_turu = $this->eleman_model->eleman_turu();

			// Firma isimleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->firma_ismi = $this->eleman_model->firma_ismi();

			// Kılıf Tipleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->kilif_tipi = $this->eleman_model->kilif_tipi();
		}

		public function index(){
			$this->load->view('arge/eleman/eleman_goster');
		}

		public function eleman_ekle()
		{
			// Eleman ekle sayfasındaki form işlemleri için form helperi yüklendi
			$this->load->helper('form');

			// Databaseden çekilen eleman türleri eleman_ekle sayfasına yollanabilmek için veri arrayi içine atıldı
			$veri['eleman_turu'] = $this->eleman_turu;

			// Databaseden firma isimleri çekildi..
			$veri['firma_ismi'] = $this->firma_ismi;

			// Databaseden kilif tipleri çekildi..
			$veri['kilif_tipi'] = $this->kilif_tipi;

			$veri['form_hatalari'] = '';

			// eleman ekle sayfası veri arrayi ile yüklendi
			$this->load->view('arge/eleman/eleman_ekle', $veri);
		}

		public function eleman_ekle_kontrol()
		{
			// form kontrolü için 
			$this->load->library('form_validation');


			$this->form_validation->set_rules('eleman_kodu', 'Eleman Kodu', 'trim|required|min_length[2]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('eleman_ozellik', 'Eleman Özellik', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
			$this->form_validation->set_rules('eleman_adet', 'Eleman Adeti', 'trim|required|min_length[1]|max_length[8]|xss_clean|numeric');

			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 
			

				// Eleman ekle sayfasındaki form işlemleri için form helperi yüklendi
				$this->load->helper('form');
		
				// Databaseden çekilen eleman türleri eleman_ekle sayfasına yollanabilmek için veri arrayi içine atıldı
				$veri['eleman_turu'] = $this->eleman_turu;

				// Databaseden firma isimleri çekildi..
				$veri['firma_ismi'] = $this->firma_ismi;

				// Databaseden kilif tipleri çekildi..
				$veri['kilif_tipi'] = $this->kilif_tipi;
					
				// hatalar form_hatalari değişkenine yüklendi
				$veri['form_hatalari'] =  validation_errors();

				$this->load->view('arge/eleman/eleman_ekle', $veri);

			} else {

					$veri['eleman_kodu'] = $this->input->post('eleman_kodu');
					$veri['firma_ismi'] = $this->input->post('firma_ismi');
					$veri['eleman_turu'] = $this->input->post('eleman_turu');
					$veri['kilif_tipi'] = $this->input->post('kilif_tipi');
					$veri['eleman_ozellik'] = $this->input->post('eleman_ozellik');
					$veri['eleman_adet'] = $this->input->post('eleman_adet');
					$veri['numune'] = $this->input->post('numune');

					$this->eleman_model->eleman_bilgilerini_database_yaz($veri);

				// formdan çekilen bilgiler ile eleman_ekleme_basarili sayfası yüklendi 
				$this->load->view('arge/eleman/eleman_ekleme_basarili');
			}


		}
	}
/* End of the file: eleman.php */
/* Location: ./application/controllers/arge/eleman/ */
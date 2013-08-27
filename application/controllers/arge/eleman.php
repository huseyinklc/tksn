<?php 
	class Eleman extends CI_Controller
	{
		public $eleman_turu;
		public $firma_ismi;
		public $kilif_tipi;
		public $veri = array();

		public function __construct()
		{
			// Framework parent constuructor çağırıldı..
			parent::__construct();

			// Form işlemleri için form helperi yüklendi
			$this->load->helper('form');

			// form kontrolü için 
			$this->load->library('form_validation');

			// database işlemleri için model yüklendi
			$this->load->model('arge/eleman_model');

			// Eleman türleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->eleman_turu = $this->eleman_model->eleman_turu();

			// Firma isimleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->firma_ismi = $this->eleman_model->firma_ismi();

			// Kılıf Tipleri dropdown liste eklenebilmesi için databaseden çekildi
			$this->kilif_tipi = $this->eleman_model->kilif_tipi();


			// Databaseden çekilen eleman türleri eleman_ekle sayfasına yollanabilmek için veri arrayi içine atıldı
			$this->veri['eleman_turu'] = $this->eleman_turu;

			// Databaseden firma isimleri çekildi..
			$this->veri['firma_ismi'] = $this->firma_ismi;


			// Databaseden kilif tipleri çekildi..
			$this->veri['kilif_tipi'] = $this->kilif_tipi;
		}

		public function index(){
			$this->load->view('arge/eleman/eleman_goster');
		}

		public function eleman_ekle()
		{
			// Eleman ekle sayfasındaki form işlemleri için form helperi yüklendi
			$this->load->helper('form');

			
			$this->veri['form_hatalari'] = '';

			// eleman ekle sayfası veri arrayi ile yüklendi
			$this->load->view('arge/eleman/eleman_ekle', $this->veri);
		}

		public function eleman_ekle_kontrol()
		{



			$this->form_validation->set_rules('eleman_kodu', 'Eleman Kodu', 'trim|required|min_length[2]|max_length[50]|xss_clean');
			$this->form_validation->set_rules('ozellik', 'Eleman Özellik', 'trim|required|min_length[2]|max_length[1000]|xss_clean');
			$this->form_validation->set_rules('adet', 'Eleman Adeti', 'trim|required|min_length[1]|max_length[8]|xss_clean|numeric');

			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 
					
				// hatalar form_hatalari değişkenine yüklendi
				$this->veri['form_hatalari'] =  validation_errors();

				$this->load->view('arge/eleman/eleman_ekle', $this->veri);

			} else {

					// Formdan gelen bilgiler array içine yazıldı
					$formdan_gelen_bilgiler['eleman_kodu'] = $this->input->post('eleman_kodu');
					$formdan_gelen_bilgiler['firma_id'] = $this->input->post('firma_id');
					$formdan_gelen_bilgiler['eleman_turu_id'] = $this->input->post('eleman_turu_id');
					$formdan_gelen_bilgiler['kilif_id'] = $this->input->post('kilif_id');
					$formdan_gelen_bilgiler['ozellik'] = $this->input->post('ozellik');
					$formdan_gelen_bilgiler['adet'] = $this->input->post('adet');
					$formdan_gelen_bilgiler['numune'] = $this->input->post('numune');

					// Formdan gelen bilgiler database yazılmaya çalışıldı
					if($this->eleman_model->eleman_bilgilerini_database_yaz($formdan_gelen_bilgiler)) {
						// Eğer başarılı ise, database yazılan değerler ve dropdown'daki listeler databaseden çekilerek 
						// ekrana yazdırılır
						$eleman_ekle_basarili_verileri['eleman_kodu'] = $formdan_gelen_bilgiler['eleman_kodu'];
						$eleman_ekle_basarili_verileri['firma_ismi'] = $this->eleman_model->firmaid_ismi($formdan_gelen_bilgiler['firma_id']);
						$eleman_ekle_basarili_verileri['eleman_turu'] = $this->eleman_model->elemanid_turu($formdan_gelen_bilgiler['eleman_turu_id']);
						$eleman_ekle_basarili_verileri['kilif'] = $this->eleman_model->kilifid_turu($formdan_gelen_bilgiler['kilif_id']);
						$eleman_ekle_basarili_verileri['ozellik'] = $formdan_gelen_bilgiler['ozellik'];
						$eleman_ekle_basarili_verileri['adet'] = $formdan_gelen_bilgiler['adet'];
						$eleman_ekle_basarili_verileri['numune'] = $formdan_gelen_bilgiler['numune']; 

						$this->load->view('arge/eleman/eleman_ekleme_basarili', $eleman_ekle_basarili_verileri);
					} else {
						// Hata sayfası yapılacak
						echo 'interval server error';
					}
			}
		}

		/*
		* Database'de bulunan elemanlar yeterli gelmediğinde eleman türü eklemek için
		*/

		public function eleman_turu_ekle()
		{
			// ilk yüklemede form hatası olmadığı için boş yolluyoruz
			$veri['form_hatalari'] = '';

			// eleman_turu_ekle sayfamizi yükledik
			$this->load->view('arge/eleman/eleman_turu_ekle',$veri);
		}

		/**
		 * Eklediğimi eleman turunu konrol edip databe yazacaz..
		 */
		public function eleman_turu_ekle_kontrol()
		{
			// Eleman türü için kontrol edilecek kuralları yazdık..
			$this->form_validation->set_rules('eleman_turu', 'Eleman Türü', 'trim|required|min_length[2]|max_length[50]|xss_clean');

			// Kontrolü yapıyoruz
			if($this->form_validation->run() == FALSE) {
				// eğer formda hata varsa 	
			
				// hatalar form_hatalari değişkenine yüklendi
				$this->veri['form_hatalari'] =  validation_errors();
				$this->load->view('arge/eleman/eleman_ekle', $this->veri);

			} else {
					// Herşey yolunda ise;

					// Formdan gelen bilgiler array içine yazıldı
					$formdan_gelen_bilgiler['eleman_turu'] = $this->input->post('eleman_turu');


					// Formdan gelen bilgiler database yazılmaya çalışıldı
					if($this->eleman_model->eleman_turu_bilgilerini_database_yaz($formdan_gelen_bilgiler['eleman_turu'])) {

						// Eğer başarılı ise eklenen eleman türü ek ekranda tekrar bastırıldı.
						$eleman_turu_ekle_basarili_verileri['eleman_turu'] = $formdan_gelen_bilgiler['eleman_turu'];
					

						$this->load->view('arge/eleman/eleman_turu_ekleme_basarili', $eleman_turu_ekle_basarili_verileri);
					} else {
						// Hata sayfası yapılacak
						echo 'interval server error';
					}
			}

		}


	}
/* End of the file: eleman.php */
/* Location: ./application/controllers/arge/eleman/ */